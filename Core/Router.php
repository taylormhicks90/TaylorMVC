<?php

namespace TaylorMVC\App\Core;

use TaylorMVC\App\Core\Enums\HTTP_METHOD;
use TaylorMVC\App\Core\Exceptions\PageNotFoundException;

/**
 * Class Router
 *
 * @author  Taylor Hicks <taylor@instantofferengine.com>
 * @package App
 */
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param \TaylorMVC\App\Core\Request  $request
     * @param \TaylorMVC\App\Core\Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get(string $path, string|array|callable $callback): void
    {
        $this->routes[HTTP_METHOD::GET->value][$path] = $callback;
    }

    public function post(string $path, string|array|callable $callback): void{
        $this->routes[HTTP_METHOD::POST->value][$path] = $callback;
    }

    /**
     * @throws \Exception|\TaylorMVC\App\Core\Exceptions\PageNotFoundException
     */
    public function resolve(): mixed
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method->value][$path] ?? false;
        if (!$callback) {
            throw new PageNotFoundException('Route Not Found');
        }
        return $callback;
    }


}
