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

class UpdateVehiculeCoverageActionTest extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();

        /** @var Container $container */
        $container = $app->getContainer();

        $vehicleYear = '2010';
        $vehicleModelId = 6;
        $state = 0;

        $vehicleRepositoryProphecy = $this->prophesize(VehicleRepository::class);
        $vehicleRepositoryProphecy
            ->updateCoverage($vehicleModelId, $vehicleYear, $state)
            ->shouldBeCalledOnce();

        $container->set(VehicleRepository::class, $vehicleRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/api/vehicle-update/6/2010/0');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = '';
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }

}
