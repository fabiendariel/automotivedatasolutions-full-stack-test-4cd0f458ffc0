<?php
declare(strict_types=1);

namespace App\Application\Actions\VehicleModel;

use Psr\Http\Message\ResponseInterface as Response;

class ListVehicleModelsByMakeAction extends VehicleModelAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $vehicleMakeId = (int) $this->resolveArg('id');
        $vehicleModels = $this->vehicleModelRepository->findModelsByMake($vehicleMakeId);

        $this->logger->info("Vehicle models for the make id `${vehicleMakeId}` list was viewed.");

        return $this->respondWithJSON(['vehicle-make-models' => $vehicleModels]);
    }
}
