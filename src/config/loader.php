<?php
/** Diplodocus
* 	----------
*	@file
*	@desc Load all important file and setup from settings
*/
require_once ("class/Core/Cli.php");
require_once ("class/Core/Setting.php");
\Core\Setting::load();

require_once ("class/Core/Database.php");
\Core\Database::instantiate();

$table = [
    'name' => 'translate_text',
    'param' => [
        [
            'name' => "id_default",
            'config' => [
                "int",
                "null"
            ]
        ]
    ]
];
// die();

// \Core\Database::createTable(json_encode($table));
\Core\Database::update();
die();
require_once ("class/Core/Route.php");
require_once ("class/Core/Router.php");
require_once ("class/Core/Page.php");

require_once ("class/Core/Module.php");
require_once ("class/Core/Component.php");

require_once ("class/Components/Container.php");
require_once ("class/Components/Text.php");
require_once ("class/Components/Button.php");
require_once ("class/Components/Link.php");
require_once ("class/Components/Icon.php");
require_once ("class/Components/Item.php");
require_once ("class/Components/Menu.php");
require_once ("class/Components/Navbar.php");


require_once ("modules/Nav.php");
require_once ("modules/Cam.php");
require_once ("config/routes.php");
