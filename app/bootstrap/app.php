<?php

use Core\Injector;
use Core\Router;

session_start();

Injector::get(Router::class);

collect(
    config('app.providers')
)->map(function (string $provider) {
    call_user_func([$provider, 'boot']);
});

$router = Injector::get(Router::class);
echo $router->run()->render();