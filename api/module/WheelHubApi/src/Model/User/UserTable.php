<?php

namespace WheelHubApi\Model\User;

use RuntimeException;
use Laminas\Db\TableGateway\TableGatewayInterface;

class UserTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getAll()
    {
        return $this->tableGateway->select();
    }

    public function getUser(string $value, string $fieldName = 'id'): User|null
    {
        $rowset = $this->tableGateway->select([$fieldName => $value]);
        $row = $rowset->current();
        return $row;
    }
    public function updateUser(array $set, string $where): int
    {
        return $this->tableGateway->update($set, $where);
    }

    public function saveUser(User $user)
    {
        $data = [
            'username' => $user->username,
            'password' => $user->password,
            'last_login' => $user->lastLogin,
            'user_config_id' => $user->userConfigId,
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
            'email' => $user->email,
            'gender' => $user->gender,
            'role_id' => $user->roleId,
            'address_id' => $user->addressId,
            'verified' => $user->verified,
            'active' => $user->active,
            'driver_licence_number' => $user->driverLicenceNumber,
            'driver_licence_date' => $user->driverLicenceDate,
        ];

        $id = (int) $user->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        try {
            $this->getUser($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update user with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteUser($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}
