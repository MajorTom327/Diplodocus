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
	private static $file = "config/setting.php";

	public function __construct() {
		self::load();
	}

	/**
	 * Return default value for init
	 */
	private static function default() {
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
		"script" => [],
		"script_start" => [],
		"style" => []
		],
	];
EOT;
	}

	/**
	 * Reset file of settings
	 */
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
			require(static::$file);
		else {
			file_put_contents(static::$file, self::default());
			require(static::$file);
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
