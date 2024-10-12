<?php

namespace WheelHubApi;

use Laminas\Router\Http\Literal;
use Laminas\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;
use Laminas\ServiceManager\Factory\InvokableFactory;
use WheelHubApi\Model\User\UserTableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\LoginController::class => ReflectionBasedAbstractFactory::class
        ],
    ],
    'view_manager' => [
        'display_exceptions' => false,
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    'service_manager' => [
        'factories' => [
            Model\User\UserTable::class => UserTableFactory::class,
            Service\Logger::class => function ($container) {
                return new Service\Logger('logs.txt');
            },
        ],
    ],
    'router' => [
        'routes' => [
            'Login' => [
                'type'    => Literal::class,
                'options' => [
                    'route' => '/api/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'login',
                    ],
                ]
            ],
            // 'Register' => [
            //     'type'    => Literal::class,
            //     'options' => [
            //         'route' => '/api/register',
            //         'defaults' => [
            //             'controller' => Controller\RegisterController::class,
            //             'action'     => 'register',
            //         ],
            //     ]
            // ]
        ]
    ],
];
