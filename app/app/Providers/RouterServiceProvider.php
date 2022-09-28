<?php

namespace App\Providers;

use Auryn\InjectionException;
use Core\Injector;
use Core\Router;
use Core\ServiceProvider;

class RouterServiceProvider extends ServiceProvider
{
    /**
     * @throws InjectionException
     */
    public static function boot()
    {
        Injector::get(Router::class);
    }
}