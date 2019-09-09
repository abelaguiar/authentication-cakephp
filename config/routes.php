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

    $routes->connect('/roles/:roleId/permissions', [
        'controller' => 'Permissions', 'action' => 'index'
    ], [
        '_name' => 'permissions.roles'
    ])
    ->setPatterns(['roleId' => '\d+'])
    ->setPass(['roleId']);

    $routes->connect('/roles/:roleId/permissions/save', [
        'controller' => 'Permissions', 'action' => 'save'
    ], [
        '_name' => 'permissions.roles.save'
    ])
    ->setPatterns(['roleId' => '\d+'])
    ->setPass(['roleId']);

    $routes->fallbacks(DashedRoute::class);
});
