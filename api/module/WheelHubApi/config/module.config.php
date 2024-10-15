<?php

namespace WheelHubApi;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\AbstractFactory\ReflectionBasedAbstractFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\LoginController::class => ReflectionBasedAbstractFactory::class,
            Controller\CarController::class => ReflectionBasedAbstractFactory::class,
            Controller\CarBrandController::class => ReflectionBasedAbstractFactory::class,
            Controller\CarModelController::class => ReflectionBasedAbstractFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Model\User\UserTable::class => Model\User\UserTableFactory::class,
            Model\Car\CarTable::class => Model\Car\CarTableFactory::class,
            Model\CarBrand\CarBrandTable::class => Model\CarBrand\CarBrandTableFactory::class,
            Model\CarModel\CarModelTable::class => Model\CarModel\CarModelTableFactory::class,
            Service\Logger::class => function ($container) {
                return new Service\Logger('logs.txt');
            },
        ],
    ],
    'router' => [
        'routes' => [
            'login' => [
                'type'    => Literal::class,
                'options' => [
                    'route' => '/api/login',
                    'defaults' => [
                        'controller' => Controller\LoginController::class,
                        'action'     => 'login',
                    ],
                ]
            ],
            'get-cars' => [
                'type'    => Literal::class,
                'options' => [
                    'route' => '/api/car/get-cars',
                    'defaults' => [
                        'controller' => Controller\CarController::class,
                        'action'     => 'getCars',
                    ],
                ],
            ],
            'get-car' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/car/get-car[/:id]',
                    'defaults' => [
                        'controller' => Controller\CarController::class,
                        'action'     => 'getCar',
                    ],
                    'constraints' => [
                        'id' => '[0-9]+'
                    ],
                ]
            ],
            'delete-car' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/car/delete[/:id]',
                    'defaults' => [
                        'controller' => Controller\CarController::class,
                        'action'     => 'deleteCar',
                    ],
                    'constraints' => [
                        'id' => '[0-9]+'
                    ],
                ]
            ],
            'check-car-exist' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/api/car/check-car-exist',
                    'defaults' => [
                        'controller' => Controller\CarController::class,
                        'action'     => 'checkCarExist',
                    ],
                ]
            ],
            'add-car' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/api/car/add-car',
                    'defaults' => [
                        'controller' => Controller\CarController::class,
                        'action'     => 'addCar',
                    ],
                ]
            ],
            'update-car' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/api/car/update-car',
                    'defaults' => [
                        'controller' => Controller\CarController::class,
                        'action'     => 'updateCar',
                    ],
                ]
            ],
            'update-car-status' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/api/car/update-car-status',
                    'defaults' => [
                        'controller' => Controller\CarController::class,
                        'action'     => 'updateCarStatus',
                    ],
                ]
            ],
            'get-model' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api/car-models/get-model[/:id]',
                    'defaults' => [
                        'controller' => Controller\CarModelController::class,
                        'action'     => 'getModel',
                    ],
                    'constraints' => [
                        'id' => '[0-9]+'
                    ],
                ]
            ],
            'get-brands' => [
                'type'    => Literal::class,
                'options' => [
                    'route' => '/api/car-brands/get-all',
                    'defaults' => [
                        'controller' => Controller\CarBrandController::class,
                        'action'     => 'getBrands',
                    ],
                ],
            ],

        ]
    ],
    'view_manager' => [
        'display_exceptions' => false,
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
