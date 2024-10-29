<?php

namespace WheelHubApi\Model\User;

use Laminas\Db\Adapter\AdapterInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class UserTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null): UserTable
    {
        $dbAdapter = $container->get(AdapterInterface::class);
        return new UserTable($dbAdapter);
    }
}
