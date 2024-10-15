<?php

namespace WheelHubApi\Model\CarModel;

use Laminas\Db\Adapter\AdapterInterface;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class CarModelTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): CarModelTable
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        return new CarModelTable($dbAdapter);
    }
}
