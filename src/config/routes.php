<?php
/** Diplodocus
 * 	----------
 *	@file
 *	@desc List files
 *	@author vthomas
*/

require_once ("class/Core/Route.php");
require_once ("pages/Dashboard.php");

Router::add(new Get("/", new Dashboard()));
Router::add(new Get("/dashboard", new Dashboard()));
