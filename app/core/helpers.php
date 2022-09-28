<?php

use Core\Router;
use JetBrains\PhpStorm\NoReturn;

function config($path): mixed
{
    $keys = explode('.', $path);
    $file = array_shift($keys);
    $value = require APP_ROOT . "config/$file.php";
    try {
        foreach ($keys as $key) {
            $value = $value[$key];
        }
    } catch (Exception) {
        $value = null;
    }
    return $value;
}

#[NoReturn] function abort(int $code, $message = ''): void
{
    header("HTTP/1.1 $code $message");
    echo $message;
    exit;
}

function redirect($path): void
{
    Router::redirect($path);
}