<?php

namespace App\Domain\Vehicle;

use PDO;

/**
 * Repository.
 */
class VehicleRepository
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
     * Convert an associative array to a VehicleYear object
     *
     * @param array $data
     *
     * @return Vehicle
     */
    public function convertArrayToObject(array $data): Vehicle
    {
        $vehicle = new Vehicle();
        $vehicle->loadFromData($data);

        return $vehicle;
    }

    /**
     * Get all vehicle year rows.
     *
     * @return array 
     */
    public function findList(): array
    {
        $records = [];

        $sql = "SELECT * FROM vehicle_make WHERE state = 1 ORDER BY name;";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $makes = $stmt->fetchAll();

        foreach($makes as $make){

            $row = ['vehicle_make_id' => $make['vehicle_make_id']];

            $sql = "SELECT * 
                    FROM vehicle_model
                    INNER JOIN vehicle 
                    ON vehicle_model.vehicle_model_id = vehicle.vehicle_model_id
                    WHERE 
                        vehicle.vehicle_make_id=:vehicle_make_id
                    AND state = 1
                    ORDER BY name;";

            $stmt = $this->connection->prepare($sql);
            $stmt->execute($row);
            $models = $stmt->fetchAll();
            foreach ($models as $model){
            $row = ['vehicle_model_id' => $model['vehicle_model_id']];

                $sql = "SELECT DISTINCT(vehicle_year) 
                        FROM vehicle
                        WHERE vehicle_model_id=:vehicle_model_id
                        AND state = 1
                        ORDER BY vehicle_year DESC;";

                $stmt = $this->connection->prepare($sql);
                $stmt->execute($row);
                
                $record[$make['name']]['coverage'][$model['name']] = $stmt->fetchAll();
            }
            
        }

        if (!count($records)) {
            throw new VehicleListNotFoundException();
        }
        
        return array_map(function($record) {
            return $this->convertArrayToObject($record)->jsonSerialize();
        }, $records);
    }

    /**
     * Find all years where we got vehicles.
     *
     * @return array
     */
    public function findAllYears(): array
    {
        $sql = "SELECT DISTINCT(vehicle_year) FROM vehicle AND state = 1 ORDER BY vehicle_year DESC;";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($row);

        $record = $stmt->fetch();

        if (!$record) {
            throw new VehicleYearsListNotFoundException();
        }

        return $this->convertArrayToObject($record)->jsonSerialize();
    }

     /**
     * Remove a particular model and year vehicule from been return in the list.
     *
     * @param int $vehicleModelId The vehicle model ID
     *
     * @param string $vehicleYear The vehicle model year
     *
     * @param bool $state The vehicle coverage state we're looking to update
     *
     * @return void
     */
    public function updateCoverage(int $vehicleModelId, string $vehicleYear, bool $state ): void
    {
        $row = ['vehicle_model_id' => $vehicleModelId];
        $row = ['vehicle_year' => $vehicleYear];
        $row = ['state' => $state];

        $sql = "UPDATE vehicle
                SET state=:state, updated=NOW()
                WHERE vehicle_model_id=:vehicle_model_id
                AND vehicle_year=:vehicle_year;";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($row);
    }
}