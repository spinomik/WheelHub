<?php

namespace WheelHubApi\Model\CarBrand;

use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Sql;
use Laminas\Db\ResultSet\ResultSet;

class CarBrandTable
{
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAll(): array
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select()
            ->from('car_brands');

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();
        $data = [];
        foreach ($resultSet as $row) {
            $data[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'createdAt' => $row['created_at'],
                'updatedAt' => $row['updated_at'],
            ];
        }

        return $data;
    }

    public function getBrand(string $value, string $fieldName = 'id'): ?CarBrand
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('car_brands')
            ->where([$fieldName => $value]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();

        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new CarBrand());
        return $resultSetPrototype->initialize($resultSet)->current();
    }

    public function updateBrand(array $set, string $where): int
    {
        $sql = new Sql($this->adapter);
        $update = $sql->update('car_brands');
        $update->set($set);
        $update->where($where);

        $statement = $sql->prepareStatementForSqlObject($update);
        return $statement->execute()->getAffectedRows();
    }

    public function saveCar(CarBrand $carBrand)
    {
        $data = [
            'name' => $carBrand->name
        ];

        $id = (int) $carBrand->id;

        if ($id === 0) {
            $this->adapter->getDriver()->getConnection()->beginTransaction();
            try {
                $sql = new Sql($this->adapter);
                $insert = $sql->insert('car_brands');
                $insert->values($data);
                $statement = $sql->prepareStatementForSqlObject($insert);
                $statement->execute();
                $this->adapter->getDriver()->getConnection()->commit();
                return;
            } catch (RuntimeException $e) {
                $this->adapter->getDriver()->getConnection()->rollback();
                throw $e;
            }
        }

        try {
            $this->getBrand($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update Brand with identifier %d; does not exist',
                $id
            ));
        }

        $this->updateBrand($data, "'id' = $id");
    }

    public function deleteBrand($id)
    {
        $sql = new Sql($this->adapter);
        $delete = $sql->delete('car_brands');
        $delete->where(['id' => (int) $id]);

        $statement = $sql->prepareStatementForSqlObject($delete);
        return $statement->execute()->getAffectedRows();
    }
}
