<?php
declare(strict_types=1);

namespace App\Application\Actions\Vehicle;

use Psr\Http\Message\ResponseInterface as Response;

class ListVehicleYearsAction extends VehicleAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $vehicleYears = $this->vehicleRepository->findAllYears();

        $this->logger->info("Vehicle years list was viewed.");

        return $this->respondWithJSON(['vehicle-years' => $vehicleYears]);
    }
}
