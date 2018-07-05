<?php

namespace Category;

use Doctrine\ORM\EntityManager;
use DoctrineORMModule\Service\EntityManagerAliasCompatFactory;
use DoctrineORMModule\Service\EntityManagerFactory;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'service_manager' =>[
        'aliases' => array(
            'category' => 'Category\Controller\CategoryController',
        ),
        'factories' => array(

        ),
    ],
    'router' => [
        'routes' => [
            'categories' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/categories',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'createCategories' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/categories/new',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'new',
                    ],
                ],
            ],
            'editCategories' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/categories/edit/[:id]',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'edit',
                    ],
                ],
            ],
            'showCategory' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/categories/show/[:id]',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'show',
                    ],
                ],
            ],
            'deleteCategory' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/categories/delete/[:id]',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'delete',
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
            'layout/layout'           => __DIR__ . '/../../../view/layout/layout.phtml',
            'category/category/index' => __DIR__ . '/../../../view/category/index/index.phtml',
            'category/category/new' => __DIR__ . '/../../../view/category/index/new.phtml',
            'category/category/edit' => __DIR__ . '/../../../view/category/index/edit.phtml',
            'category/category/show' => __DIR__ . '/../../../view/category/index/show.phtml',
            'category/category/delete' => __DIR__ . '/../../../view/category/index/delete.phtml',
            'error/404'               => __DIR__ . '/../../../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../../../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
