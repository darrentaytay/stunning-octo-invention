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
    },

   Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../app/Views');
        return new Twig_Environment($loader);
    },

    \App\Template\Templater::class => function(Twig_Environment $twig){
        return new \App\Template\TwigTemplater($twig);
    },

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

if(getenv('REQUEST_METHOD') == "POST")
{
    $headers = getallheaders();

    if(!array_key_exists('X-XSRF-TOKEN', $headers))
    {
        header('HTTP/1.0 403 Forbidden');
        exit();       
    }

    if($headers['X-XSRF-TOKEN'] != $_COOKIE['XSRF-TOKEN'])
    {
        header('HTTP/1.0 403 Forbidden');
        exit();          
    }
}
else
{
    setcookie('XSRF-TOKEN', md5(uniqid(rand(), true)), time() + 3600, '/');
}

# Call the controller/action
$contents = $controller->{$router->getAction()}();

header('Content-Type: text/html; charset=utf-8');
echo $contents;
exit;