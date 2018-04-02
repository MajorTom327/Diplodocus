<?php
	require_once ("../class/Core/Setting.php");
	\Core\Setting::load("../config/setting.php");
	require_once ("../class/Core/Cli.php");
	require_once ("../class/Core/Database.php");
	\Core\Database::update();