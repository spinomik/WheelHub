<?php

namespace WheelHubApi\Model\CarBrand;

use Laminas\Db\Adapter\AdapterInterface;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class CarBrandTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): CarBrandTable
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        return new CarBrandTable($dbAdapter);
    }
}
