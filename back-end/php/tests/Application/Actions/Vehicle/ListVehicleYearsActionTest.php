<?php
declare(strict_types=1);

namespace Tests\Application\Actions\Vehicle;

use App\Application\Actions\ActionError;
use App\Application\Actions\ActionPayload;
use App\Application\Handlers\HttpErrorHandler;
use App\Domain\Vehicle\Vehicle;
use App\Domain\Vehicle\VehicleYearsNotFoundException;
use App\Domain\Vehicle\VehicleRepository;
use DI\Container;
use Slim\Middleware\ErrorMiddleware;
use Tests\TestCase;

class ListVehicleYearsActionTest extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();

        /** @var Container $container */
        $container = $app->getContainer();

        $vehicleYears = ['2010','2011','2012','2013','2014','2015','2016','2017','2018'];

        $vehicleRepositoryProphecy = $this->prophesize(VehicleRepository::class);
        $vehicleRepositoryProphecy
            ->findAllYears()
            ->willReturn($vehicleYears)
            ->shouldBeCalledOnce();

        $container->set(VehicleRepository::class, $vehicleRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/api/vehicle-years');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = ['vehicle-years' => $vehicleYears];
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }

    public function testActionThrowsUserNotFoundException()
    {
        $app = $this->getAppInstance();

        $callableResolver = $app->getCallableResolver();
        $responseFactory = $app->getResponseFactory();

        $errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);
        $errorMiddleware = new ErrorMiddleware($callableResolver, $responseFactory, true, false, false);
        $errorMiddleware->setDefaultErrorHandler($errorHandler);

        $app->add($errorMiddleware);

        /** @var Container $container */
        $container = $app->getContainer();

        $vehicleRepositoryProphecy = $this->prophesize(VehicleRepository::class);
        $vehicleRepositoryProphecy
            ->findAllYears()
            ->willThrow(new VehicleYearsNotFoundException())
            ->shouldBeCalledOnce();

        $container->set(VehicleRepository::class, $vehicleRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/api/vehicle-years');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedError = new ActionError(ActionError::RESOURCE_NOT_FOUND, 'The vehicle years list you requested does not exist.');
        $expectedPayload = new ActionPayload(404, null, $expectedError);
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}
