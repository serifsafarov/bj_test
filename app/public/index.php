<?php

if (empty($_ENV['APP_DEBUG']) || true) {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
}

require '../vendor/autoload.php';

require_once APP_ROOT . 'bootstrap/app.php';

