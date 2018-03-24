<?php
require_once ("class/Core/Route.php");
require_once ("pages/Dashboard.php");

Router::add(new Get("/", new Dashboard()));
