<?php
declare(strict_types=1);

namespace Tests\Application\Actions\VehicleModel;

use App\Application\Actions\ActionPayload;
use App\Domain\VehicleModel\VehicleModelRepository;
use App\Domain\VehicleModel\VehicleModel;
use DI\Container;
use Tests\TestCase;

class ListVehicleModelsByMakeActionTest extends TestCase
{
    public function testAction()
    {
        $app = $this->getAppInstance();

        /** @var Container $container */
        $container = $app->getContainer();

        $vehicleModel = new VehicleModel();

        $vehicleModelRepositoryProphecy = $this->prophesize(VehicleModelRepository::class);
        $vehicleModelRepositoryProphecy
            ->findModelsByMake(1)
            ->willReturn([$vehicleModel])
            ->shouldBeCalledOnce();

        $container->set(VehicleModelRepository::class, $vehicleModelRepositoryProphecy->reveal());

        $request = $this->createRequest('GET', '/api/vehicle-makes/1/models');
        $response = $app->handle($request);

        $payload = (string) $response->getBody();
        $expectedPayload = ['vehicle-makes/1/models' => [$vehicleModel]];
        $serializedPayload = json_encode($expectedPayload, JSON_PRETTY_PRINT);

        $this->assertEquals($serializedPayload, $payload);
    }
}
