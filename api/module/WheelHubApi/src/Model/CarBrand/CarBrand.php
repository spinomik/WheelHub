<?php

declare(strict_types=1);

namespace WheelHubApi\Model\CarBrand;

class CarBrand
{
    private $id;
    private $name;
    private $createdAt;
    private $updatedAt;

    public function exchangeArray(array $data): void
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->createdAt = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updatedAt = !empty($data['updated_at']) ? $data['updated_at'] : null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
