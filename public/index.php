<?php

use App\Exceptions\RoutingException;
use DI\ContainerBuilder;

# Include Composers Autoload
include('../vendor/autoload.php');

# Build a DI Container
$containerBuilder = new ContainerBuilder;
$container        = $containerBuilder->build();

# Instantiate the Router class and resolve the request
$router = $container->get('App\Core\Router');

try {
	$router->resolve($_SERVER['REQUEST_URI']);
}
catch(RoutingException $exception) {
	header('HTTP/1.0 404 Not Found');
	echo '404: Page not found.';
	exit();
}