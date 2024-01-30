<?php

use Bramus\Router\Router;
use Ngotr\Ontap\Controllers\Admin\CategoriesController;
use Ngotr\Ontap\Controllers\Admin\DashboardController;
use Ngotr\Ontap\Controllers\Admin\UserController;
use Ngotr\Ontap\Controllers\Client\HomeController;

// Create Router instance
$router = new Router();

// Define routes
$router->get('/', HomeController::class . '@index');

$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@index');
    $router->mount('/users', function () use ($router) {
        $router->get('/', UserController::class . '@index');
        $router->match('GET|POST', '/create', UserController::class . '@create');
        $router->get('/{id}/show', UserController::class . '@show');
        $router->match('GET|POST', '/{id}/update', UserController::class . '@update');
        $router->match('GET|POST', '/{id}/delete', UserController::class . '@delete');
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/', CategoriesController::class . '@index');
        $router->match('GET|POST', '/create', CategoriesController::class . '@create');
        $router->match('GET|POST', '/{id}/update', CategoriesController::class . '@update');
        $router->match('GET|POST', '/{id}/delete', CategoriesController::class . '@delete');
    });
});
// Run it!
$router->run();