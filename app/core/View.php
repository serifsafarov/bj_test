<?php

namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View extends Environment
{
    public function __construct()
    {
        $loader = new FilesystemLoader(APP_ROOT . '/resources/views');
        parent::__construct($loader, [
            'cache' => APP_ROOT . '/bootstrap/cache/views',
            'debug' => true
        ]);
    }
}