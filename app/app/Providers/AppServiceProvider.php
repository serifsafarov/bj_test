<?php

namespace App\Providers;

use Auryn\InjectionException;
use Core\Injector;
use Core\ServiceProvider;
use Core\View;
use Illuminate\Database\Capsule\Manager as Capsule;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @throws InjectionException
     */
    public static function boot()
    {
        static::initEloquent();
        Injector::get(View::class);
    }

    private static function initEloquent()
    {
        $config = config('database.connections.mysql');
        $capsule = new Capsule;
        $capsule->addConnection([
            "driver" => "mysql",
            "host" => $config['host'],
            "database" => $config['database'],
            "username" => $config['username'],
            "password" => $config['password']
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}