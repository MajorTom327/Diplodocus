<?php
/** Diplodocus
* 	----------
*	@file
*/

namespace Core;
/** Setting
 * Generate the setting, handle it and all about setting
 */
class Setting {
	private static $_setting = null;
	private static $file = "config/setting.php";

	public function __construct() {
		self::load();
	}

	/**
	 * Return default value for init
	 */
	private static function defaultSettings() {
		return <<<EOT
<?php
\$config = [
	"database" => [
		"user" => "root",
		"pass" => "root",
		"base" => "base",
		"host" => "localhost"
		],
	"main" => [
		"sitename" => "Site Name",
		"script" => [
			"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		],
		"script_start" => [],
		"style" => [
			"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
			]
		],
	];
EOT;
	}

	/**
	 * Reset file of settings
	 */
	private static function reset() {
		file_put_contents(static::$file, self::defaultSettings());
	}

	/**
	 * Load config from file set in the static private file var.
	 * Set somes default if no data
	 */
	public static function load($file = NULL) {
		$config = "";
		// self::reset();
		$file = ($file === null) ? static::$file : $file;
		if (file_exists($file))
			require($file);
		else {
			file_put_contents($file, self::defaultSettings());
			require($file);
		}
		static::$_setting = $config;

	}

	/**
	 * Get Database Config
	 */
	public static function database() {
		return (static::$_setting['database']);
	}

	/**
	 * Get Main Config
	 */
	public static function main() {
		return (static::$_setting['main']);
	}
}
