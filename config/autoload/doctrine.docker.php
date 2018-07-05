<?php
return [
'doctrine' => [
    'configuration' => [
        'orm_default' => [
            'proxy_dir' => __DIR__.'/../../data/DoctrineORMModule/Proxy',
            'proxy_namespace' => 'DoctrineORMModule\Proxy',
        ]
    ],
    'connection' => [
        // default connection name
        'orm_default' => [
            'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
            'params' => [
                'host'     => 'db',
                'port'     => '3306',
                'user'     => 'app',
                'password' => 'app',
                'dbname'   => 'app',
            ],
        ],
    ],
],
];