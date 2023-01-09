<?php

namespace TaylorMVC\App\Core;


use TaylorMVC\App\Core\Exceptions\PageNotFoundException;

/**
 * Class Application
 *
 * @author  Taylor Hicks <taylor@instantofferengine.com>
 * @package App
 *
 */
class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run(): void
    {
        try {
            $callback = $this->router->resolve();
            $output='';
            if(is_string($callback)){
                $output = View::render($callback);
            }
            if(is_callable($callback))
            {
                $output = $callback();
            }
            if(is_array($callback)){
                list($controller,$method) = $callback;
                $output = call_user_func([ new $controller,$method]);
            }
            echo $output;
        } catch (PageNotFoundException $exception) {
            app()->response->setStatusCode(404);
            echo View::render('Exceptions/404');
        } catch (\Exception $exception) {
            app()->response->setStatusCode(500);
            echo View::render('Exceptions/500');
        }
    }
}
