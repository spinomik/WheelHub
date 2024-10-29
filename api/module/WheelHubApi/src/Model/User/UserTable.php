<?php

namespace WheelHubApi\Model\User;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Sql;

class UserTable
{
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAll() {}

    public function getUser(string $value, string $fieldName = 'users.id')
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('users')
            ->where([$fieldName => $value]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();

        if ($resultSet->isQueryResult() && $resultSet->getAffectedRows() > 0) {
            $row = $resultSet->current();
            return User::fromRow($row);
        }

        return null;
    }

    public function updateUser() {}
    public function saveUser() {}
    public function deleteUser() {}
}
