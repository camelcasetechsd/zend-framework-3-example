<?php

namespace Product;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'product' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/product[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ProductController::class => Controller\Factory\ProductControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\ProductManager::class => Service\Factory\ProductManagerFactory::class,

        ],
    ],
    'view_manager' => [
        'template_map' => [
            'product/index/index' => __DIR__ . '/../view/product/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
