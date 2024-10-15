<?php

declare(strict_types=1);

namespace WheelHubApi\Model\Car;

use WheelHubApi\Model\BaseModel;

class Car extends BaseModel
{
    private $id;
    private $carModelId;
    private $vin;
    private $registerNumber;
    private $available;
    private $rentId;
    private $positionLatitude;
    private $positionLongitude;
    private $millage;
    private $color;
    private $img;
    private $createdAt;
    private $updatedAt;

    private $carBrandName;
    private $carModelName;
    private $carBrandId;

    public function toArray(bool $toSnakeCase = false): array
    {
        $data = [
            'id' => $this->getId(),
            'carModelId' => $this->getCarModelId(),
            'vin' => $this->getVin(),
            'registerNumber' => $this->getRegisterNumber(),
            'available' => $this->isAvailable(),
            'rentId' => $this->getRentId(),
            'positionLatitude' => $this->getPositionLatitude(),
            'positionLongitude' => $this->getPositionLongitude(),
            'millage' => $this->getMillage(),
            'color' => $this->getColor(),
            'img' => $this->getImg(),
        ];
        if (!$toSnakeCase) {
            $data['brandName'] = $this->getCarBrandName();
            $data['modelName'] = $this->getCarModelName();
            $data['carBrandId'] = $this->getCarBrandId();
        }
        return $toSnakeCase ? $this->mapKeysToSnakeCase($data) : $data;
    }

    public static function fromRow(array $row, bool $toSnakeCase = false): self
    {
        $car = new self();
        if ($toSnakeCase) {
            $row = self::mapKeysToSnakeCase($row);
        }
        $car->setId($row['id'] ?? null);
        $car->setCarModelId((int)$row['car_model_id'] ?? null);
        $car->setVin($row['vin'] ?? null);
        $car->setRegisterNumber($row['register_number'] ?? null);
        $car->setAvailable($row['available'] ? true : (!$row['available'] ? false : null));
        $car->setRentId($row['rent_id'] ?? null);
        $car->setPositionLatitude($row['position_latitude'] ?? null);
        $car->setPositionLongitude($row['position_longitude'] ?? null);
        $car->setMillage($row['millage'] ?? null);
        $car->setColor($row['color'] ?? null);
        $car->setImg($row['img'] ?? null);
        $car->setCreatedAt($row['created_at'] ?? null);
        $car->setUpdatedAt($row['updated_at'] ?? null);
        $car->setCarBrandName($row['car_brand_name'] ?? null);
        $car->setCarModelName($row['car_model_name'] ?? null);
        $car->setCarBrandId($row['brand_id'] ?? null);

        return $car;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarModelId(): ?int
    {
        return $this->carModelId;
    }

    public function getVin(): ?string
    {
        return $this->vin;
    }

    public function getRegisterNumber(): ?string
    {
        return $this->registerNumber;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function getRentId(): ?int
    {
        return $this->rentId;
    }

    public function getPositionLatitude(): ?string
    {
        return $this->positionLatitude;
    }

    public function getPositionLongitude(): ?string
    {
        return $this->positionLongitude;
    }

    public function getMillage(): ?int
    {
        return $this->millage;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function getCarBrandName(): ?string
    {
        return $this->carBrandName;
    }

    public function getCarModelName(): ?string
    {
        return $this->carModelName;
    }

    public function getCarBrandId(): ?int
    {
        return $this->carBrandId;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setCarModelId(?int $carModelId): void
    {
        $this->carModelId = $carModelId;
    }

    public function setVin(?string $vin): void
    {
        $this->vin = $vin;
    }

    public function setRegisterNumber(?string $registerNumber): void
    {
        $this->registerNumber = $registerNumber;
    }

    public function setAvailable(?bool $available): void
    {
        $this->available = $available;
    }

    public function setRentId(?int $rentId): void
    {
        $this->rentId = $rentId;
    }

    public function setPositionLatitude(?string $positionLatitude): void
    {
        $this->positionLatitude = $positionLatitude;
    }

    public function setPositionLongitude(?string $positionLongitude): void
    {
        $this->positionLongitude = $positionLongitude;
    }

    public function setMillage(?int $millage): void
    {
        $this->millage = $millage;
    }

    public function setColor(?string $color): void
    {
        $this->color = $color;
    }

    public function setImg(?string $img): void
    {
        $this->img = $img;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function setCarBrandName(?string $carBrandName): void
    {
        $this->carBrandName = $carBrandName;
    }

    public function setCarModelName(?string $carModelName): void
    {
        $this->carModelName = $carModelName;
    }

    public function setCarBrandId(?int $carBrandId): void
    {
        $this->carBrandId = $carBrandId;
    }
}
