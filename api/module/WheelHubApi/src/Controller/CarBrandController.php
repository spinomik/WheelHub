<?php

declare(strict_types=1);

namespace WheelHubApi\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\JsonModel;
use WheelHubApi\Model\CarBrand\CarBrandTable;

class CarBrandController extends AbstractActionController
{
    private $table;

    public function __construct(CarBrandTable $table)
    {
        $this->table = $table;
    }

    public function getBrandsAction(): JsonModel
    {
        return new JsonModel([
            'status'   => 'success',
            'code'     => 200,
            'access'   => true,
            'message'  => 'Cars found successfully',
            'data'     => $this->table->getAll(),
        ]);
    }
}
