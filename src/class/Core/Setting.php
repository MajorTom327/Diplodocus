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

	public function __construct() {
		self::load();
	}

	public static function load() {
		echo "Load...";
	}
}
