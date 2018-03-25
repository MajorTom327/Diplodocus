<?php
require_once ("class/Core/Cli.php");
require_once ("class/Core/Setting.php");
Setting::load();

require_once ("class/Core/Route.php");
require_once ("class/Core/Router.php");
require_once ("class/Core/Page.php");

require_once ("class/Core/Module.php");
require_once ("modules/Navbar.php");

require_once ("config/routes.php");
