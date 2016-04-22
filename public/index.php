<?php

use App\Exceptions\RoutingException;
use DI\ContainerBuilder;

# Include Composers Autoload
include('../vendor/autoload.php');

# Build a DI Container
$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions([
    \App\Repositories\UserRepository::class => function(){
        return new \App\Repositories\JSON\JSONUserRepository(new \App\Repositories\JSON\JSONUserTransformer);
    }
]);
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

# Get instance of the controller via Dependency Injenction Container
$controller = $container->get(sprintf('\App\Controllers\%s', $router->getController()));

# Call the controller/action
$contents = $controller->{$router->getAction()}();

header('Content-Type: text/html; charset=utf-8');
echo $contents;
exit;