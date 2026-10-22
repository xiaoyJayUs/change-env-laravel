<?php

return [
    'mysql' => [
        'local' => [
            'DB_HOST' => '127.0.0.1',
            'DB_NAME' => '',
            'DB_USER' => 'root',
            'DB_PASS' => '123456',
            'DB_PORT' => '3306',
        ],
        'dev'   => [
            'DB_HOST' => '127.0.0.1',
            'DB_NAME' => '',
            'DB_USER' => 'root',
            'DB_PASS' => '123456',
            'DB_PORT' => '3306',
        ],
        'prod'  => [
            'DB_HOST' => '127.0.0.1',
            'DB_NAME' => '',
            'DB_USER' => 'root',
            'DB_PASS' => '123456',
            'DB_PORT' => '3306',
        ],
    ],
    'mongo' => [
        'local' => [
            'MONGO_HOST'        => '127.0.0.1',
            'MONGO_NAME'        => '',
            'MONGO_USER'        => 'root',
            'MONGO_PASS'        => '123456',
            'MONGO_PORT'        => '27017',
            'MONGO_AUTH_SOURCE' => '',
        ],
        'dev'   => [
            'MONGO_HOST'        => '127.0.0.1',
            'MONGO_NAME'        => '',
            'MONGO_USER'        => 'root',
            'MONGO_PASS'        => '123456',
            'MONGO_PORT'        => '27017',
            'MONGO_AUTH_SOURCE' => '',
        ],
        'prod'  => [
            'MONGO_HOST'        => '127.0.0.1',
            'MONGO_NAME'        => '',
            'MONGO_USER'        => 'root',
            'MONGO_PASS'        => '123456',
            'MONGO_PORT'        => '27017',
            'MONGO_AUTH_SOURCE' => '',
        ],
    ],
    'redis' => [
        'local' => [
            'REDIS_HOST' => '127.0.0.1',
            'REDIS_PASS' => '',
            'REDIS_PORT' => '6379',
        ],
        'dev'   => [
            'REDIS_HOST' => '127.0.0.1',
            'REDIS_PASS' => '',
            'REDIS_PORT' => '6379',
        ],
        'prod'  => [
            'REDIS_HOST' => '127.0.0.1',
            'REDIS_PASS' => '',
            'REDIS_PORT' => '6379',
        ],
    ],
];