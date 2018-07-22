<?php

namespace Category;

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'category' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/category[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CategoryController::class => Controller\Factory\CategoryControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            Service\CategoryManager::class => Service\Factory\CategorytManagerFactory::class,

        ],
    ],


    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'category/category/index' => __DIR__ . '/../view/index.phtml',
            'category/category/add' => __DIR__ . '/../view/add.phtml',
            'category/category/edit' => __DIR__ . '/../view/edit.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
