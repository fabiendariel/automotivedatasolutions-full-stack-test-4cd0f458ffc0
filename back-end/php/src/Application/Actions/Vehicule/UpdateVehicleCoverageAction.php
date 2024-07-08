<?php
declare(strict_types=1);

namespace App\Application\Actions\Vehicle;

use Psr\Http\Message\ResponseInterface as Response;

class UpdateVehicleCoverageAction extends VehicleAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $vehicleModelId = (int) $this->resolveArg('model_id');
        $vehicleYear = (string) $this->resolveArg('year');
        $state = (int) $this->resolveArg('state');
        $this->vehicleRepository->updateCoverage($vehicleModelId, $vehicleYear, $state);

        $this->logger->info("Vehicle coverage state for the model id `${vehicleModelId}` and year `${vehicleYear}` was updated with the state `${state}`.");

        return true;
    }
}
