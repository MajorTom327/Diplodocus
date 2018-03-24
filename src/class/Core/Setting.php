<?php
/** Diplodocus
* 	----------
*	@file
*/

/** Setting
 * Generate the setting, handle it and all about setting
 */
class Setting {
	private static $_setting = null;
	private static $file = "config/setting.json";

	public function __construct() {
		self::load();
	}

	/**
	 * Return default value for init
	 */
	private static function default() {
		return <<<EOT
		{
			"database": {
				"user": "root",
				"pass": "root",
				"base": "base",
				"host": "localhost"
			},
			"main": {
				"sitename": "Site Name"
			}
		}
EOT;
	}

	private static function reset() {
		file_put_contents(static::$file, self::default());
	}

	/**
	 * Load config from file set in the static private file var.
	 * Set somes default if no data
	 */
	public static function load() {
		$config = "";
		self::reset();
		if (file_exists(static::$file))
			$config = file_get_contents(static::$file);
		else {
			file_put_contents(static::$file, self::default());
		}
		static::$_setting = json_decode($config);
		// var_dump(static::$_setting);
		// var_dump(self::database());
	}

	/**
	 * Get Database Config
	 */
	public static function database() {
		return (static::$_setting->database);
	}

	/**
	 * Get Main Config
	 */
	public static function main() {
		return (static::$_setting->main);
	}
}
