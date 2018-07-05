<?php

namespace Category;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'category-list' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/category/list',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'category-add' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/category/add',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'add',
                    ],
                ],
            ],
            'category-add-ajax' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/category/post',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'addAjax',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CategoryController::class => Controller\CategoryControllerFactory::class,
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
          'category/category/index' => __DIR__ . '/../view/category/index.phtml',
          'category/category/add' => __DIR__ . '/../view/category/add.phtml',
            // 'catalog/catalog/edit' => __DIR__ . '/../view/catalog/edit.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
