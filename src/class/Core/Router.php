<?php
require_once ("Route.php");

class Router {
	private static $_routes = [];

	public function __constructor() {

	}

	public static function add(Route $route) {
		if (isset(static::$_routes[$route->uri()]))
			throw new Exception("This URI is already set: " . $routes->uri());
		static::$_routes[$route->uri()] = clone $route;
	}

	public static function del(String $route) {
		if (!isset(static::$_routes[$route]))
			throw new Exception("Trying to delete a unexistant Route");
		unset (static::$_routes[$route]);
	}

	public static function find(String $route) {
		return (static::$_routes[$route]);
	}

	public static function dispatch() {
		$uri = $_SERVER['REQUEST_URI'];
		echo $uri;
	}
}
