<?php

declare(strict_types=1);

namespace WheelHubApi\Model\User;

class User
{
    public $id;
    public $username;
    public $password;
    public $lastLogin;
    public $userConfigId;
    public $firstName;
    public $lastName;
    public $email;
    public $gender;
    public $roleId;
    public $addressId;
    public $verified;
    public $active;
    public $driverLicenceNumber;
    public $driverLicenceDate;
    public $createdAt;
    public $updatedAt;

    public function exchangeArray(array $data)
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
}
