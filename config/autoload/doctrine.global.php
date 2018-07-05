<?php
/**
 * Doctrine Global Config
 */

return [
'doctrine' => [
    'driver' => [
        // defines an annotation driver, named `annotation_driver`
        'annotation_driver' => [
            'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
            'cache' => 'array',
            'paths' => [
                    realpath(__DIR__ . '/../../module/Category/src/Entity'),
                    realpath(__DIR__ . '/../../module/Product/src/Entity'),
                ],
            ],
        // default metadata driver, aggregates all other drivers into a single one.
        // Override `orm_default` only if you know what you're doing
        'orm_default' => [
            'drivers' => [
                // register `annotation_driver` for any entity under namespace `\Entity`
                'Category\Entity' => 'annotation_driver',
                'Product\Entity' => 'annotation_driver',
            ]       ,
        ],
    ],
],
];