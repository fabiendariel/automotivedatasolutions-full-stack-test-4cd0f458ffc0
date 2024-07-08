<?php
declare(strict_types=1);

namespace App\Domain\VehicleModel;

use App\Domain\DomainException\DomainRecordNotFoundException;

class VehicleModelsByMakeListNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The vehicle model list by make id you requested does not exist.';
}
