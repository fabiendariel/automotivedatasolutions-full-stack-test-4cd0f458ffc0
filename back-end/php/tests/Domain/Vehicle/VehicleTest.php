<?php
declare(strict_types=1);

namespace Tests\Domain\Vehicle;

use App\Domain\Vehicle\Vehicle;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    public function vehicleProvider()
    {
        return [
            [1, 1, 1, '2014'],
            [1, 1, 1, '2015'],
            [1, 1, 1, '2018'],
            [2, 1, 2, '2013'],
            [2, 1, 2, '2014'],
            [2, 1, 2, '2015'],
            [2, 1, 2, '2016'],
            [2, 1, 2, '2017'],
            [3, 3, 5, '2017'],
        ];
    }

    /**
     * @dataProvider vehicleProvider
     * @param int    $id
     * @param int    $make_id
     * @param int    $model_id
     * @param string $year
     */
    public function testGetters(int $id, int $make_id, int $model_id, string $year)
    {
        $vehicle = new VehicleMake();
        $vehicle->setId($id);
        $vehicle->setMakeId($make_id);
        $vehicle->setModelId($model_id);
        $vehicle->setYear($year);

        $this->assertEquals($id, $vehicle->getId());
        $this->assertEquals($make_id, $vehicle->getMakeId());
        $this->assertEquals($model_id, $vehicle->getModelId());
        $this->assertEquals($year, $vehicle->getUrl());
    }

    /**
     * @dataProvider vehicleProvider
     * @param int    $id
     * @param int    $make_id
     * @param int    $model_id
     * @param string $year
     */
    public function testJsonSerialize(int $id, int $make_id, int $model_id, string $year)
    {
        $vehicle = new VehicleMake();
        $vehicle->setId($id);
        $vehicle->setMakeId($make_id);
        $vehicle->setModelId($model_id);
        $vehicle->setYear($year);

        $expectedPayload = json_encode([
            'id' => $id,
            'make_id' => $make_id,
            'model_id' => $model_id,
            'year' => $year,
        ]);

        $this->assertEquals($expectedPayload, json_encode($vehicle));
    }
}
