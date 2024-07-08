<?php

namespace App\Domain\VehicleModel;

use PDO;

/**
 * Repository.
 */
class VehicleModelRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Convert an associative array to a VehicleModel object
     *
     * @param array $data
     *
     * @return VehicleModel
     */
    public function convertArrayToObject(array $data): VehicleModel
    {
        $vehicleModel = new VehicleModel();
        $vehicleModel->loadFromData($data);

        return $vehicleModel;
    }   

    /**
     * Find all models by make id.
     *
     * @param int $vehicleMakeId The vehicle make ID
     *
     * @return array
     */
    public function findModelsByMake(int $vehicleMakeId): array
    {
        $row = ['vehicle_make_id' => $vehicleMakeId];

        $sql = "SELECT * 
                FROM vehicle_model
                WHERE 
                    vehicle_model_id 
                IN (SELECT vehicle_model_id
                    FROM vehicle 
                    WHERE vehicle_make_id=:vehicle_make_id
                    AND state = 1)
                AND state = 1
                ORDER BY name;";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($row);

        $record = $stmt->fetch();

        if (!$record) {
            throw new VehicleModelByMakeListNotFoundException();
        }

        return $this->convertArrayToObject($record)->jsonSerialize();
    }

    
}