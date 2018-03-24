<?php
/** Diplodocus
* 	----------
*	@file
*/
require_once ("Route.php");

/** Router
 * Router is the class who is routing all query
 */
class Router {
	private static $_routes = [];

	public function __constructor() {
	}

	/** add
	 * @param Route route to handle
	 * Adding a route to the router parsing
	 */
	public static function add(Route $route) {
		if (isset(static::$_routes[$route->uri()]))
			throw new Exception("This URI is already set: " . $routes->uri());
		static::$_routes[$route->uri()] = clone $route;
	}

	/** del
	 * @param String route to unhandle
	 * Unhandle a route.
	 */
	public static function del(String $route) {
		if (!isset(static::$_routes[$route]))
			throw new Exception("Trying to delete a unexistant Route");
		unset (static::$_routes[$route]);
	}

	/** find
	 * @param String route to search
	 * find a route and get data on it
	 */
	public static function find(String $route) {
		return (static::$_routes[$route]);
	}

	/** dispatch
	 * Most important function. Dispatch query over the handle route
	 */
	public static function dispatch() {
		$uri = $_SERVER['REQUEST_URI'];
		echo $uri;
	}
}
