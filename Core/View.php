<?php

namespace TaylorMVC\App\Core;

class View
{
    public static function render(string $view): string
    {
        $layoutContent = self::layoutContent();
        $viewContent = self::viewContent($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected static function layoutContent(): string
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/Views/Layouts/app.php";
        return ob_get_clean()?:'';
    }

    protected static function viewContent(string $view): string
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/Views/$view.php";
        return ob_get_clean()?:'';
    }
}
