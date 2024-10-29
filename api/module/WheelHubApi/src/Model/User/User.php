<?php

declare(strict_types=1);

namespace WheelHubApi\Model\User;

use WheelHubApi\Model\BaseModel;

class User extends BaseModel
{
    private $id;
    private $username;
    private $password;
    private $lastLogin;
    private $userConfigId;
    private $firstName;
    private $lastName;
    private $email;
    private $gender;
    private $roleId;
    private $addressId;
    private $verified;
    private $active;
    private $driverLicenceNumber;
    private $driverLicenceDate;
    private $createdAt;
    private $updatedAt;

    public function toArray(bool $toSnakeCase = false): array
    {
        $data = [
            'id' => $this->getId(),
            'username' => $this->getUsername(),
            'password' => $this->getPassword(),
            'lastLogin' => $this->getLastLogin(),
            'userConfigId' => $this->getUserConfigId(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'email' => $this->getEmail(),
            'gender' => $this->getGender(),
            'roleId' => $this->getRoleId(),
            'addressId' => $this->getAddressId(),
            'verified' => $this->getVerified(),
            'active' => $this->getActive(),
            'driverLicenceNumber' => $this->getDriverLicenceNumber(),
            'driverLicenceDate' => $this->getDriverLicenceDate(),
            'createdAt' => $this->getCreatedAt(),
            'updatedAt' => $this->getUpdatedAt(),
        ];

        return $toSnakeCase ? $this->mapKeysToSnakeCase($data) : $data;
    }

    public static function fromRow(array $row, bool $toSnakeCase = false): self
    {
        $user = new self();
        if ($toSnakeCase) {
            $row = self::mapKeysToSnakeCase($row);
        }

        $user->setId($row['id'] ?? null);
        $user->setUsername($row['username'] ?? null);
        $user->setPassword($row['password'] ?? null);
        $user->setLastLogin($row['last_login'] ?? null);
        $user->setUserConfigId($row['user_config_id'] ?? null);
        $user->setFirstName($row['first_name'] ?? null);
        $user->setLastName($row['last_name'] ?? null);
        $user->setEmail($row['email'] ?? null);
        $user->setGender($row['gender'] ?? null);
        $user->setRoleId($row['role_id'] ?? null);
        $user->setAddressId($row['address_id'] ?? null);
        $user->setVerified(empty($row['verified']) ? false : true);
        $user->setActive(empty($row['active']) ? false : true);
        $user->setDriverLicenceNumber($row['driver_licence_number'] ?? null);
        $user->setDriverLicenceDate($row['driver_licence_date'] ?? null);
        $user->setCreatedAt($row['created_at'] ?? null);
        $user->setUpdatedAt($row['updated_at'] ?? null);

        return $user;
    }

    // Getters and setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function getLastLogin(): ?string
    {
        return $this->lastLogin;
    }

    public function getUserConfigId(): ?int
    {
        return $this->userConfigId;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function getRoleId(): ?int
    {
        return $this->roleId;
    }

    public function getAddressId(): ?int
    {
        return $this->addressId;
    }

    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function getDriverLicenceNumber(): ?string
    {
        return $this->driverLicenceNumber;
    }

    public function getDriverLicenceDate(): ?string
    {
        return $this->driverLicenceDate;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    // Settery
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function setLastLogin(?string $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function setUserConfigId(?int $userConfigId): void
    {
        $this->userConfigId = $userConfigId;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setGender(?int $gender): void
    {
        $this->gender = $gender;
    }

    public function setRoleId(?int $roleId): void
    {
        $this->roleId = $roleId;
    }

    public function setAddressId(?int $addressId): void
    {
        $this->addressId = $addressId;
    }

    public function setVerified(?bool $verified): void
    {
        $this->verified = $verified;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function setDriverLicenceNumber(?string $driverLicenceNumber): void
    {
        $this->driverLicenceNumber = $driverLicenceNumber;
    }

    public function setDriverLicenceDate(?string $driverLicenceDate): void
    {
        $this->driverLicenceDate = $driverLicenceDate;
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
