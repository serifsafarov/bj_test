<?php
return [
    'default' => (bool)env('USE_TEST_DB_CONNECTION') ?
        env('DB_CONNECTION_TEST', 'mysql_test') :
        env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mysql_test' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL_TEST'),
            'host' => env('DB_HOST_TEST', '127.0.0.1'),
            'port' => env('DB_PORT_TEST', '3306'),
            'database' => env('DB_DATABASE_TEST', 'forge'),
            'username' => env('DB_USERNAME_TEST', 'forge'),
            'password' => env('DB_PASSWORD_TEST', ''),
            'unix_socket' => env('DB_SOCKET_TEST', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

    ],

    'migrations' => 'migrations'
];