<?php

namespace WheelHubApi\Model\CarModel;

use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Sql;
use Laminas\Db\ResultSet\ResultSet;

class CarModelTable
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
            ->from('car_models')
            ->join('car_brands', 'car_models.brand_id = car_brands.id', ['car_brands_name' => 'brand_name']);

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();
        $data = [];
        foreach ($resultSet as $row) {
            $data[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'brandName' => $row['brand_name'],
                'createdAt' => $row['created_at'],
                'updatedAt' => $row['updated_at'],
            ];
        }

        return $data;
    }
    public function getModelsByBrand(int $brandId): array
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select()
            ->from('car_models')
            ->where(['brand_id' => $brandId]);

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

    public function getModel(string $value, string $fieldName = 'id'): ?CarModel
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('car_models')
            ->where([$fieldName => $value]);

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();

        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new CarModel());
        return $resultSetPrototype->initialize($resultSet)->current();
    }

    public function updateBrand(array $set, string $where): int
    {
        $sql = new Sql($this->adapter);
        $update = $sql->update('car_models');
        $update->set($set);
        $update->where($where);

        $statement = $sql->prepareStatementForSqlObject($update);
        return $statement->execute()->getAffectedRows();
    }

    public function saveCar(CarModel $carModel)
    {
        $data = [
            'name' => $carModel->name,
            'brand_id' => $carModel->brandId
        ];

        $id = (int) $carModel->id;

        if ($id === 0) {
            $this->adapter->getDriver()->getConnection()->beginTransaction();
            try {
                $sql = new Sql($this->adapter);
                $insert = $sql->insert('car_models');
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
            $this->getModel($id);
        } catch (RuntimeException $e) {
            throw new RuntimeException(sprintf(
                'Cannot update Model with identifier %d; does not exist',
                $id
            ));
        }

        $this->updateBrand($data, "'id' = $id");
    }

    public function deleteBrand($id)
    {
        $sql = new Sql($this->adapter);
        $delete = $sql->delete('car_models');
        $delete->where(['id' => (int) $id]);

        $statement = $sql->prepareStatementForSqlObject($delete);
        return $statement->execute()->getAffectedRows();
    }
}
