<?php
declare(strict_types=1);

namespace App\Domain\Vehicle;

use JsonSerializable;

class Vehicle implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $make_id;

    /**
     * @var int|null
     */
    private $model_id;

    /**
     * @var string
     */
    private $year;

    /**
     * @var boolean
     */
    private $state;

    /**
     * @var DateTime
     */
    private $updated;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = 0;
        $this->make_id = 0;
        $this->model_id = 0;
        $this->year = '';
        $this->state = 1;
        $this->updated = new \DateTime();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param $id int
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getMakeId(): ?int
    {
        return $this->make_id;
    }

    /**
     * @param $make_id int
     */
    public function setMakeId(int $make_id): void
    {
        $this->make_id = $make_id;
    }

    /**
     * @return int|null
     */
    public function getModelId(): ?int
    {
        return $this->model_id;
    }

    /**
     * @param $model_id int
     */
    public function setModelId(int $model_id): void
    {
        $this->model_id = $model_id;
    }

    /**
     * @return string
     */
    public function getYear(): string
    {
        return $this->year;
    }

    /**
     * @param $year string
     */
    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    /**
     * @return bool
     */
    public function getState(): bool
    {
        return $this->state;
    }

    /**
     * @param $state bool
     */
    public function setState(bool $state): void
    {
        $this->state = $state;
    }

    /**
     * @return DateTime
     */
    public function getUpdated(): ?DateTime
    {
        return $this->updated;
    }

    /**
     * @param $updated DateTime
     */
    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }

    /**
     * @param $data array
     */
    public function loadFromData(array $data): void
    {
        if (array_key_exists('vehicle_id', $data) && $data['vehicle_id'] != null) {
            $this->setId((int)$data['vehicle_id']);
        }

        if (array_key_exists('vehicle_make_id', $data) && $data['vehicle_make_id'] != null) {
            $this->setMakeId((int)$data['vehicle_make_id']);
        }

        if (array_key_exists('vehicle_model_id', $data) && $data['vehicle_model_id'] != null) {
            $this->setModelId((int)$data['vehicle_model_id']);
        }

        if (array_key_exists('vehicle_year', $data) && $data['vehicle_year'] != null) {
            $this->setYear($data['vehicle_year']);
        }

        if (array_key_exists('state', $data) && $data['state'] != null) {
            $this->setState($data['state']);
        }

        if (array_key_exists('updated', $data) && $data['updated'] != null) {
            $this->setUpdated($data['updated']);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'makeId' => $this->getMakeId(),
            'modelId' => $this->getModelId(),
            'year' => $this->getYear(),
            'state' => $this->getState(),
            'updated' => $this->getUpdated()->format('Y-m-d H:i:s'), 
        ];
    }
}
