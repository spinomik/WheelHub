<?php

declare(strict_types=1);

namespace WheelHubApi\Model\User;

class User
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

    public function exchangeArray(array $data): void
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->username = !empty($data['username']) ? $data['username'] : null;
        $this->password = !empty($data['password']) ? $data['password'] : null;
        $this->lastLogin = !empty($data['last_login']) ? $data['last_login'] : null;
        $this->userConfigId = !empty($data['user_config_id']) ? $data['user_config_id'] : null;
        $this->firstName = !empty($data['first_name']) ? $data['first_name'] : null;
        $this->lastName = !empty($data['last_name']) ? $data['last_name'] : null;
        $this->email = !empty($data['email']) ? $data['email'] : null;
        $this->gender = !empty($data['gender']) ? $data['gender'] : null;
        $this->roleId = !empty($data['role_id']) ? $data['role_id'] : null;
        $this->addressId = !empty($data['address_id']) ? $data['address_id'] : null;
        $this->verified = !empty($data['verified']) ? $data['verified'] : null;
        $this->active = !empty($data['active']) ? $data['active'] : null;
        $this->driverLicenceNumber = !empty($data['driver_licence_number']) ? $data['driver_licence_number'] : null;
        $this->driverLicenceDate = !empty($data['driver_licence_date']) ? $data['driver_licence_date'] : null;
        $this->createdAt = !empty($data['created_at']) ? $data['created_at'] : null;
        $this->updatedAt = !empty($data['updated_at']) ? $data['updated_at'] : null;
    }

    // Gettery
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

    public function setGender(?string $gender): void
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
