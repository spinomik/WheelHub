<?php

declare(strict_types=1);

namespace WheelHubApi\Controller;

use Laminas\Http\Request;
use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use WheelHubApi\Model\Car\CarTable;
use WheelHubApi\Model\Car\Car;

class CarController extends AbstractActionController
{
    private $table;

    public function __construct(CarTable $table)
    {
        $this->table = $table;
    }
    public function getCarAction(): JsonModel
    {
        $carId = $this->params()->fromRoute('id', 0);
        $car = $this->table->getCar($carId);
        return new JsonModel([
            'status'   => 'success',
            'code'     => 200,
            'access'   => true,
            'message'  => 'Cars found successfully',
            'data'     => $car->toArray(),
        ]);
    }
    public function getCarsAction(): JsonModel
    {
        $cars = $this->table->getAll();
        foreach ($cars as $car) {
            $data[] = $car->toArray();
        }
        return new JsonModel([
            'status'   => 'success',
            'code'     => 200,
            'access'   => true,
            'message'  => 'Cars found successfully',
            'data'     => $data,
        ]);
    }

    public function deleteCarAction(): JsonModel
    {
        $carId = (int) $this->params()->fromRoute('id', 0);
        if ($carId === 0) {
            return new JsonModel([
                'status' => 'error',
                'code' => 400,
                'message' => 'Invalid car ID',
            ]);
        }

        $this->table->deleteCar($carId);

        return new JsonModel([
            'status' => 'success',
            'code' => 200,
            'message' => 'Car deleted successfully',
        ]);
    }

    public function addCarAction(): JsonModel
    {
        $request = $this->getRequest();
        $data = json_decode($request->getContent(), true);

        if ($this->isDataInvalid($data)) {
            return new JsonModel([
                'status' => 'error',
                'code' => 400,
                'message' => 'Invalid data!',
            ]);
        }
        $car = Car::fromRow($data, true);

        $car->setVin(strtolower($car->getVin()));
        $car->setRegisterNumber(strtolower($car->getRegisterNumber()));
        $car->setPositionLatitude($car->getPositionLatitude() ? strtolower($car->getPositionLatitude()) : null);
        $car->setPositionLongitude($car->getPositionLongitude() ? strtolower($car->getPositionLongitude()) : null);
        $car->setImg($car->getImg() ?: './favicon.png');
        $id = $this->table->saveCar($car);

        return new JsonModel([
            'status' => 'success',
            'code' => 200,
            'message' => "Car added successfully, new Car Id: {$id}",
            'data' => $car->toArray()
        ]);
    }

    public function updateCarAction(): JsonModel
    {
        $request = $this->getRequest();
        $data = json_decode($request->getContent(), true);
        if ($this->isDataInvalid($data)) {
            return new JsonModel([
                'status' => 'error',
                'code' => 400,
                'message' => 'Invalid data!',
            ]);
        }
        $car = Car::fromRow($data, true);

        $car->setVin(strtolower($car->getVin()));
        $car->setRegisterNumber(strtolower($car->getRegisterNumber()));

        $id = $this->table->saveCar($car);

        return new JsonModel([
            'status' => 'success',
            'message' => "Car updated successfully, new Car Id: $id",
            'id' => $id
        ]);
    }

    public function updateCarStatusAction(): JsonModel
    {
        $request = $this->getRequest();
        $data = json_decode($request->getContent(), true);
        return new JsonModel([
            'status' => 'success',
            'message' => "Car updated successfully"
        ]);
    }
    public function checkCarExistAction(): JsonModel
    {
        $request = $this->getRequest();
        $data = json_decode($request->getContent(), true);
        $vin = $data['vin'];
        $registerNumber = $data['registerNumber'];

        if ($this->table->carExists($vin, $registerNumber)) {
            return new JsonModel([
                'exists' => true,
                'message' => 'The car with the given VIN or registration number already exists.'
            ]);
        } else {
            return new JsonModel([
                'exists' => false,
                'message' => 'The car does not exist in the database.'
            ]);
        }
    }

    private function isDataInvalid(array $data): bool
    {
        return empty($data) ||
            !isset($data['carModelId']) || empty($data['carModelId']) ||
            !isset($data['vin']) || empty($data['vin']) ||
            !isset($data['registerNumber']) || empty($data['registerNumber']) ||
            !isset($data['millage']) || empty($data['millage']) ||
            !isset($data['color']) || empty($data['color']) ||
            !isset($data['available']) || !is_bool($data['available']);
    }
}
