<?php

namespace App\Providers;

use App\Requests\SaveTaskRequest;
use Auryn\InjectionException;
use Core\Injector;
use Core\Request;
use Core\ServiceProvider;

class RequestServiceProvider extends ServiceProvider
{
    /**
     * @throws InjectionException
     */
    public static function boot()
    {
        Injector::get(Request::class);
        Injector::get(SaveTaskRequest::class);
    }
}