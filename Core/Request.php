<?php

namespace TaylorMVC\App\Core;

use TaylorMVC\App\Core\Enums\HTTP_METHOD;

class Request
{
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? false;
        $position = strpos($path,'?');
        if (!$position) return $path;
        return substr($path,0, $position);
    }

    public function getMethod(): HTTP_METHOD
    {
        return HTTP_METHOD::from(strtolower($_SERVER['REQUEST_METHOD']));
    }
}
