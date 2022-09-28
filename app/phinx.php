<?php
const APP_ROOT = __DIR__ . '/';
return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'production' => [
                'adapter' => 'mysql',
                'host' => config('database.connections.mysql.host'),
                'name' => config('database.connections.mysql.database'),
                'user' => config('database.connections.mysql.username'),
                'pass' => config('database.connections.mysql.password'),
                'port' => config('database.connections.mysql.port'),
                'charset' => 'utf8',
            ],
            'development' => [
                'adapter' => 'mysql',
                'host' => config('database.connections.mysql.host'),
                'name' => config('database.connections.mysql.database'),
                'user' => config('database.connections.mysql.username'),
                'pass' => config('database.connections.mysql.password'),
                'port' => config('database.connections.mysql.port'),
                'charset' => 'utf8',
            ],
            'testing' => [
                'adapter' => 'mysql',
                'host' => config('database.connections.mysql_test.host'),
                'name' => config('database.connections.mysql_test.database'),
                'user' => config('database.connections.mysql_test.username'),
                'pass' => config('database.connections.mysql_test.password'),
                'port' => config('database.connections.mysql_test.port'),
                'charset' => 'utf8',
            ]
        ],
        'version_order' => 'creation'
    ];
