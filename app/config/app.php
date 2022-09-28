<?php

use App\Providers\AppServiceProvider;
use App\Providers\RequestServiceProvider;
use App\Providers\RouterServiceProvider;

return [
    'providers' => [
        AppServiceProvider::class,
        RouterServiceProvider::class,
        RequestServiceProvider::class,
    ]
];