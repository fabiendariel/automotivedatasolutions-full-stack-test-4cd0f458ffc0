<?php
declare(strict_types=1);

namespace Tests\Domain\VehicleModel;

use App\Domain\VehicleModel\VehicleModel;
use Tests\TestCase;

class VehicleModelTest extends TestCase
{
    public function vehicleModelProvider()
    {
        return [
            [1, '205'],
            [2, '306'],
            [3, '807'],
        ];
    }

    /**
     * @dataProvider vehicleModelProvider
     * @param int    $id
     * @param string $name
     */
    public function testGetters(int $id, string $name)
    {
        $vehicleModel = new VehicleModel();
        $vehicleModel->setId($id);
        $vehicleModel->setName($name);

        $this->assertEquals($id, $vehicleModel->getId());
        $this->assertEquals($name, $vehicleModel->getName());
    }

    /**
     * @dataProvider vehicleModelProvider
     * @param int    $id
     * @param string $name
     */
    public function testJsonSerialize(int $id, string $name)
    {
        $vehicleModel = new VehicleModel();
        $vehicleModel->setId($id);
        $vehicleModel->setName($name);

        $expectedPayload = json_encode([
            'id' => $id,
            'name' => $name,
        ]);

        $this->assertEquals($expectedPayload, json_encode($vehicleModel));
    }
}
