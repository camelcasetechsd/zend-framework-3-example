<?php

namespace Catalog;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'products' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/catalog/products',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'categories' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/catalog/categories',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],

        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ProductController::class => InvokableFactory::class,
            Controller\CategoryController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           =>  __DIR__ . '/../../../themes/default/layout/layout.phtml',
            'products/idex' => __DIR__ . '/../view/catalog/product/index.phtml',
            // 'catalog/catalog/add' => __DIR__ . '/../view/catalog/add.phtml',
            // 'catalog/catalog/edit' => __DIR__ . '/../view/catalog/edit.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
