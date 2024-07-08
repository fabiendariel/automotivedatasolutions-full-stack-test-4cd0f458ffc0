<?php
declare(strict_types=1);

namespace App\Domain\VehicleMake;

use JsonSerializable;

class VehicleMake implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

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
        $this->name = '';
        $this->url = '';
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param $name string
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param $url string
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
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
        if (array_key_exists('vehicle_make_id', $data) && $data['vehicle_make_id'] != null) {
            $this->setId((int)$data['vehicle_make_id']);
        }

        if (array_key_exists('name', $data) && $data['name'] != null) {
            $this->setName($data['name']);
        }

        if (array_key_exists('url', $data) && $data['url'] != null) {
            $this->setUrl($data['url']);
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
            'name' => $this->getName(),
            'url' => $this->getUrl(),
            'state' => $this->getState(),
            'updated' => $this->getUpdated()->format('Y-m-d H:i:s'), 
        ];
    }
}
