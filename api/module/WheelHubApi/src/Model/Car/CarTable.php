<?php

namespace WheelHubApi\Model\Car;

use RuntimeException;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\Sql\Sql;

class CarTable
{
    private $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getAll()
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select()
            ->from('cars')
            ->join('car_models', 'cars.car_model_id = car_models.id', ['car_model_name' => 'name'])
            ->join('car_brands', 'car_models.brand_id = car_brands.id', ['car_brand_name' => 'name']);

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();
        foreach ($resultSet as $row) {
            $data[$row['id']] = Car::fromRow($row);
        }
        return $data;
    }

    public function getCar(string $value, string $fieldName = 'cars.id'): ?Car
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('cars')
            ->where([$fieldName => $value])
            ->join('car_models', 'cars.car_model_id = car_models.id', ['car_model_name' => 'name'])
            ->join('car_brands', 'car_models.brand_id = car_brands.id', ['car_brand_name' => 'name', 'brand_id' => 'id'])
        ;

        $statement = $sql->prepareStatementForSqlObject($select);
        $resultSet = $statement->execute();

        if ($resultSet->isQueryResult() && $resultSet->getAffectedRows() > 0) {
            $row = $resultSet->current();
            return Car::fromRow($row);
        }

        return null;
    }

    public function updateCar(array $set, string $where): int
    {
        $sql = new Sql($this->adapter);
        $update = $sql->update('cars');
        $update->set($set);
        $update->where($where);

        $statement = $sql->prepareStatementForSqlObject($update);
        return $statement->execute()->getAffectedRows();
    }

    public function saveCar(Car $car)
    {
        $data = $car->toArray(true);
        $id = (int) $car->getId();
        $this->adapter->getDriver()->getConnection()->beginTransaction();

        try {
            $sql = new Sql($this->adapter);

            if ($id === 0) {
                $insert = $sql->insert('cars');
                $insert->values($data);
                $statement = $sql->prepareStatementForSqlObject($insert);
                $statement->execute();
            } else {
                $existingCar = $this->getCar($id);
                if (!$existingCar) {
                    throw new RuntimeException(sprintf(
                        "Cannot update car with identifier {$id} does not exist"
                    ));
                }

                $update = $sql->update('cars');
                $update->set($data);
                $update->where(['id' => $id]);
                $statement = $sql->prepareStatementForSqlObject($update);
                $statement->execute();
            }

            $this->adapter->getDriver()->getConnection()->commit();
        } catch (RuntimeException $e) {
            $this->adapter->getDriver()->getConnection()->rollback();
            throw $e;
        }
    }

    public function deleteCar($id)
    {
        $sql = new Sql($this->adapter);
        $delete = $sql->delete('cars');
        $delete->where(['id' => (int) $id]);

        $statement = $sql->prepareStatementForSqlObject($delete);
        return $statement->execute()->getAffectedRows();
    }

    public function carExists($vin, $registerNumber)
    {
        $sql = new Sql($this->adapter);
        $select = $sql->select();
        $select->from('cars');

        $select->where(function ($where) use ($vin, $registerNumber) {
            $where->equalTo('vin', $vin)
                ->or
                ->equalTo('register_number', $registerNumber);
        });

        $statement = $sql->prepareStatementForSqlObject($select);
        $result = $statement->execute();

        return ($result->current()) ? true : false;
    }
}
