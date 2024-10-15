<?php

declare(strict_types=1);

namespace WheelHubApi\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use WheelHubApi\Model\CarModel\CarModelTable;

class CarModelController extends AbstractActionController
{
    private $table;

    public function __construct(CarModelTable $table)
    {
        $this->table = $table;
    }

    public function getModelsAction(): JsonModel
    {
        return new JsonModel([
            'status'   => 'success',
            'code'     => 200,
            'access'   => true,
            'message'  => 'Cars found successfully',
            'data'     => $this->table->getAll(),
        ]);
    }

    public function getModelAction(): JsonModel
    {
        $brandId = (int) $this->params()->fromRoute('id', 0);

        if (empty($brandId)) {
            return new JsonModel([
                'status' => 'error',
                'code' => 400,
                'message' => 'Invalid brand ID',
            ]);
        }

        return new JsonModel([
            'status' => 'success',
            'code' => 200,
            'message' => 'Car deleted successfully',
            'data' => $this->table->getModelsByBrand($brandId)
        ]);
    }
}
