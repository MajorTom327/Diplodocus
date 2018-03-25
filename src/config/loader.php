<?php
/** Diplodocus
* 	----------
*	@file
*	@desc Load all important file and setup from settings
*/
require_once ("class/Core/Cli.php");
require_once ("class/Core/Setting.php");
Setting::load();

require_once ("class/Core/Route.php");
require_once ("class/Core/Router.php");
require_once ("class/Core/Page.php");

require_once ("class/Core/Module.php");
require_once ("class/Core/Component.php");

require_once ("class/Link.php");
require_once ("class/Item.php");
require_once ("class/Menu.php");
require_once ("class/Navbar.php");

require_once ("config/routes.php");
