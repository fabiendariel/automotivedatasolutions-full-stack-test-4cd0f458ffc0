<?php
declare(strict_types=1);

namespace App\Application\Actions\Vehicle;

use Psr\Http\Message\ResponseInterface as Response;

class ListVehiclesAction extends VehicleAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $vehicles = $this->vehicleRepository->findList();

        $this->logger->info("Vehicle list was viewed.");

        return $this->respondWithJSON(['vehicle-list' => $vehicles]);
    }
}
