<?php

namespace Product;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'router' => [
        'routes' => [
            'products' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/products',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'createProducts' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/products/new',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'new',
                    ],
                ],
            ],
            'editProducts' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/products/edit/[:id]',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'edit',
                    ],
                ],
            ],
            'showProduct' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/products/show/[:id]',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'show',
                    ],
                ],
            ],
            'deleteProduct' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/products/delete/[:id]',
                    'defaults' => [
                        'controller' => Controller\ProductController::class,
                        'action'     => 'delete',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ProductController::class => Controller\ProductControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'         => __DIR__ . '/../../../view/layout/layout.phtml',
            'product/product/index' => __DIR__ . '/../../../view/product/index/index.phtml',
            'product/product/new' => __DIR__ . '/../../../view/product/index/new.phtml',
            'product/product/edit' => __DIR__ . '/../../../view/product/index/edit.phtml',
            'product/product/show' => __DIR__ . '/../../../view/product/index/show.phtml',
            'product/product/delete' => __DIR__ . '/../../../view/product/index/delete.phtml',
            'error/404'             => __DIR__ . '/../../../view/error/404.phtml',
            'error/index'           => __DIR__ . '/../../../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
