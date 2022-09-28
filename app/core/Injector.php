<?php

namespace Core;

use Auryn\InjectionException;
use Auryn\Injector as AurynInjector;

final class Injector
{
    private static AurynInjector $injector;

    /**
     * @throws InjectionException
     */
    public static function get($className)
    {
        if (empty(Injector::$injector)) {
            Injector::$injector = new AurynInjector();
        }
        return Injector::$injector->make($className);
    }

    /**
     * @throws InjectionException
     */
    public static function execute($className, $method): mixed
    {
        return Injector::$injector->execute([$className, $method]);
    }
}