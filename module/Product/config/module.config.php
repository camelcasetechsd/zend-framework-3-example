<?php

namespace Product;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
      'routes' => [
          'product-list' => [
              'type'    => Segment::class,
              'options' => [
                  'route'    => '/product/list[/:id]',
                  'defaults' => [
                      'controller' => Controller\ProductController::class,
                      'action'     => 'index',
                  ],
              ],
          ],
          'product-add' => [
              'type'    => Segment::class,
              'options' => [
                  'route'    => '/product/add',
                  'defaults' => [
                      'controller' => Controller\ProductController::class,
                      'action'     => 'add',
                  ],
              ],
          ],
          'product-edit' => [
              'type'    => Segment::class,
              'options' => [
                  'route'    => '/product/edit[/:id]',
                  'defaults' => [
                      'controller' => Controller\ProductController::class,
                      'action'     => 'edit',
                  ],
              ],
          ],
          'product-add-ajax' => [
              'type'    => Segment::class,
              'options' => [
                  'route'    => '/product/post',
                  'defaults' => [
                      'controller' => Controller\ProductController::class,
                      'action'     => 'addAjax',
                  ],
              ],
          ],
          'product-edit-ajax' => [
              'type'    => Segment::class,
              'options' => [
                  'route'    => '/product/update',
                  'defaults' => [
                      'controller' => Controller\ProductController::class,
                      'action'     => 'updateAjax',
                  ],
              ],
          ],
          'product-delete' => [
              'type'    => Segment::class,
              'options' => [
                  'route'    => '/product/delete',
                  'defaults' => [
                      'controller' => Controller\ProductController::class,
                      'action'     => 'deleteAjax',
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
            'layout/layout'           =>  __DIR__ . '/../../../themes/default/layout/layout.phtml',
            'product/product/index' => __DIR__ . '/../view/product/index.phtml',
            'product/product/add' => __DIR__ . '/../view/product/add.phtml',
            'product/product/edit' => __DIR__ . '/../view/product/edit.phtml',
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
