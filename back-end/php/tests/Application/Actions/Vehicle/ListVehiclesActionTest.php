<?php
declare(strict_types=1);

namespace Tests\Application\Actions\Vehicle;

use App\Application\Actions\ActionPayload;
use App\Domain\Vehicle\VehicleRepository;
use App\Domain\Vehicle\Vehicle;
use DI\Container;
use Tests\TestCase;

class ListVehiclesActionTest extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();

        /** @var Container $container */
        $container = $app->getContainer();

        $vehicles = [
            1 => [
                'coverage' => [
                    903 => ['2017','2016','2015','2014'],
                    2 => ['2018','2017','2016','2015','2014'],
                    606 => ['2011','2010'],
                    986 => ['2012','2011','2010'],
                    6 => ['2014','2013','2012','2011','2010'],
                    1087 => ['2016','2015','2014','2013'],
                    7 => ['2017','2015'],
                ]            
            ]
        ];

        $vehicleRepositoryProphecy = $this->prophesize(VehicleRepository::class);
        $vehicleRepositoryProphecy
            ->findList()
            ->willReturn($vehicles)
            ->shouldBeCalledOnce();

        $container->set(VehicleRepository::class, $vehicleRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/api/vehicle-list');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = ['vehicle-list' => $vehicles];
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}
