<?php

use DI\Container;
//require "../app/controllers/HomeController.php";
//\HomeController;

use \App\controllers\HomeController;
use DI\ContainerBuilder;
use League\Plates\Engine;
use App\controllers;
use Delight\Auth\Auth;
use Aura\SqlQuery\QueryFactory;

$containerBuilder = new ContainerBuilder();
$containerBuilder->addDefinitions([

    \PDO::class => function(){  return new PDO("mysql:host=localhost; dbname=test", 'root', 'root'); },
    Engine::class => function(){ return new Engine("../app/views");},
    Delight\Auth\Auth::class   =>  function($container) {
        return new Auth($container->get('PDO'));
    },
    QueryFactory::class => function(){  return new QueryFactory("mysql");  }

]);
$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    $r->addRoute('GET', '/tasks', ["\App\controllers\HomeController", "index"]);

    $r->addRoute('GET', '/login', ["\App\controllers\LoginController", "showLogin"]);

    $r->addRoute('POST', '/log', ["\App\controllers\LoginController", "login"]);

    $r->addRoute('GET', '/create', ["\App\controllers\HomeController", "create"]);

    $r->addRoute('GET', '/logout', ["\App\controllers\LogoutController", "logout"]);

    $r->addRoute('GET', '/verify_email', ["\App\controllers\VerifyController", "verify"]);

    $r->addRoute('GET', '/register', ["\App\controllers\RegisterController", "register"]);

    $r->addRoute('POST', '/add', ["\App\controllers\HomeController", "add"]);

    $r->addRoute('POST', '/reg', ["\App\controllers\RegisterController", "reg"]);

    // {id} must be a number (\d+)
    $r->addRoute('GET', '/tasks/{id:\d+}', ["\App\controllers\HomeController", "show"]);

    $r->addRoute('GET', '/edit/{id:\d+}', ["\App\controllers\HomeController", "edit"]);

    $r->addRoute('POST', '/update/{id:\d+}', ["\App\controllers\HomeController", "update"]);

    $r->addRoute('GET', '/delete/{id:\d+}', ["\App\controllers\HomeController", "delete"]);
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo "Not found!";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "Method not allowed!";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
       // var_dump($handler, $vars);
        //var_dump($_POST);

        $container->call($handler, $vars);

        break;
}

