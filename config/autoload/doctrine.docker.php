<?php
return [
    'doctrine' => [
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