<?php
/**
 * Docker Environment Configuration
 */
use Zend\ServiceManager\Factory;

return [
    'view_manager' => [
        'display_exceptions' => true,
    ],
    'service_manager' => [
        'factories' => [
            'stdClass' => InvokableFactory::class
        ],
        'aliases' => [
            'entityManager' =>  'stdClass',
        ]
    ],
];
