<?php

use App\Controllers\AuthController;
use App\Controllers\TaskController;
use App\Middlewares\AuthMiddleware;

return [
    '' => [
        'controller' => TaskController::class,
        'method' => 'view',
        'middlewares' => []
    ],
    'api/tasks' => [
        'controller' => TaskController::class,
        'method' => 'list',
        'middlewares' => []
    ],
    'api/tasks/save' => [
        'controller' => TaskController::class,
        'method' => 'save',
        'middlewares' => [
            AuthMiddleware::class
        ]
    ],
    'api/tasks/add' => [
        'controller' => TaskController::class,
        'method' => 'add',
        'middlewares' => []
    ],

    'login' => [
        'controller' => AuthController::class,
        'method' => 'login',
        'middlewares' => []
    ],
    'api/auth/login' => [
        'controller' => AuthController::class,
        'method' => 'authorize',
        'middlewares' => []
    ],
    'api/auth/user' => [
        'controller' => AuthController::class,
        'method' => 'me',
        'middlewares' => []
    ],

];