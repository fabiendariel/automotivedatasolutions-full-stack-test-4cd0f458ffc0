<?php
declare(strict_types=1);

namespace App\Domain\Vehicle;

use App\Domain\DomainException\DomainRecordNotFoundException;

class VehicleYearsListNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The vehicle years list you requested does not exist.';
}
