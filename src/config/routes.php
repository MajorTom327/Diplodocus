<?php
/** Diplodocus
* 	----------
*	@file
*	@desc List files 
*/

require_once ("class/Core/Route.php");
require_once ("pages/Dashboard.php");

Router::add(new Get("/", new Dashboard()));
