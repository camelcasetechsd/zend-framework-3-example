<?php

namespace Product;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'product' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/product[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action' => 'index',
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
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'product/product/index' => __DIR__ . '/../view/index.phtml',
            'product/product/add' => __DIR__ . '/../view/add.phtml',
            'product/product/edit' => __DIR__ . '/../view/edit.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
