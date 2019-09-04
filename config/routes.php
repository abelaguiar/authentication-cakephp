<?php

use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {

    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware(['httpOnly' => true]));

    $routes->applyMiddleware('csrf');

    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);

    $routes->connect('/', ['controller' => 'Pages', 'action' => 'home']);
    $routes->connect('/home', ['controller' => 'Pages', 'action' => 'home']);

    $routes->fallbacks(DashedRoute::class);
});
