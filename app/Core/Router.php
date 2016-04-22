<?php namespace App\Core;

use App\Core\RouteResolver;
use App\Exceptions\UndefinedRouteException;
use App\Exceptions\InvalidRouteFormatException;

/**
 * Router Class
 * 
 * Responsible for taking a request URI and routing it
 * to a controller/method.
 */
class Router {

	/**
	 * List of routes.
	 * @var array
	 */
	private $routes;

	/**
	 * Name of resolved controller.
	 * @var string
	 */
	
	private $controller;

	/**
	 * Name os resolved action.
	 * @var string
	 */
	private $action;

	public function __construct()
	{
		$this->routes = require(__DIR__ . '/../routes.php');
	}

	/**
	 * Interface for adding a route.
	 * 
	 * @param string $path path of the route
	 * @param string $controller controller/action which the route resolves to
	 */
	public function addRoute($path, $controller)
	{
		$this->routes[$path] = $controller;
	}

	/**
	 * Resolve a route via a URI
	 * 
	 * @param  string $uri uri to resolve
	 * @return boolean
	 */
	public function resolve($uri)
	{
		if(!array_key_exists($uri, $this->routes))
		{
			throw new UndefinedRouteException(sprintf('Route for %s could not be found.', $uri));
		}

		$route = $this->routes[$uri];

		$routePieces = explode(':', $route);

		if(empty($routePieces[0]) || empty($routePieces[1]))
		{
			throw new InvalidRouteFormatException(sprintf('Route for %s is invalid.', $uri));
		}

		list($controller, $action) = $routePieces;

		$this->controller = $controller;
		$this->action     = $action;

		if(!method_exists(sprintf('\App\Controllers\%s', $controller), $action))
		{
			throw new InvalidRouteResolution(sprintf('Route for %s does not resolve to a valid class.', $uri));
		}

		return true;
	}

	/**
	 * Public getter for the resolved controller.
	 * @return string
	 */
	public function getController()
	{
		return $this->controller;
	}

	/**
	 * Public getter for the resolved action.
	 * @return string
	 */
	public function getAction()
	{
		return $this->action;
	}
}