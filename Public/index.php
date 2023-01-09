<?php
require_once __DIR__ .'/../vendor/autoload.php';

use TaylorMVC\App\Controllers\ContactController;
use TaylorMVC\App\Core\Application;



$app = new Application(dirname(__DIR__));

$app->router->get('/','home');
$app->router->get('/contact',[ContactController::class,'show']);
$app->router->post('/contact', [ContactController::class,'store']);
$app->router->get('/hello',function (){ echo 'Hello World';});
$app->router->get('/goodbye',function (){echo 'Goodbye World';});
$app->router->get('/error',function (){return 1/0;});
$app->router->get('/exception',function (){throw new Exception();});

$app->run();
