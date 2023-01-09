<?php

use TaylorMVC\App\Core\Application;

if (!function_exists('app')) {

    function app(): TaylorMVC\App\Core\Application
    {
        return Application::$app;
    }
}
