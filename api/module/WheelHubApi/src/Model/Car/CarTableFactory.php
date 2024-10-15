<?php

namespace WheelHubApi\Model\Car;

use Laminas\Db\Adapter\AdapterInterface;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class CarTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): CarTable
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        return new CarTable($dbAdapter);
    }
}
