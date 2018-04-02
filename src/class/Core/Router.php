<?php
/** Diplodocus
 * 	----------
 *	@file
 *	@author vthomas
*/

/** Router
 * Router is the class who is routing all query
 */
class Router {
	private static $_routes = [];

	public function __construct() {
	}

	/** add
	 * @param Route route to handle
	 * Adding a route to the router parsing
	 */
	public static function add(Route $route) {
		// var_dump($route);
		if (isset(static::$_routes[$route->uri()]))
			throw new Exception("This URI is already set: " . $routes->uri());
		static::$_routes[$route->uri()] = $route;
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


	public static function show() {
		foreach (static::$_routes as $r) {
			echo "[ " . $r->uri() . " ] - ";
			var_dump($r->page());
			echo "<br><br>";
		}
	}
	/** dispatch
	 * Most important function. Dispatch query over the handle route
	 */
	public static function dispatch() {
		$uri = $_SERVER['REQUEST_URI'];
		$method = $_SERVER['REQUEST_METHOD'];
		$list = [];
		foreach (static::$_routes as $el) {
			if ($uri == $el->uri())
				$list[strtoupper(get_class($el))] = $el->page();
		}
		$page = null;
		if (isset($list[$method]))
			$page = $list[$method];
		if ($page != null)//Not Found
		{
			http_response_code(200);
			$page->render_page();
		}
		else
			http_response_code(404);

	}
}
