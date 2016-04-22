<?php

use DI\ContainerBuilder;

# Include Composers Autoload
include('../vendor/autoload.php');

# Build a DI Container
$containerBuilder = new ContainerBuilder;
$container        = $containerBuilder->build();

# Instantiate the Router class and resolve the request
$router = $container->get('App\Core\Router');
$resolved = $router->resolve($_SERVER['REQUEST_URI']);

dd($resolved);