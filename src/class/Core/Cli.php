<?php
/** Diplodocus
* 	----------
*	@file
*/

namespace Core;
class Cli
{
	private static $_prompt = "\033[90m$> \033[0m";

	/**
	 * cli tester
	 */
	public static function is_cli() {
		return (php_sapi_name() === "cli");
	}

	/**
	 * cli tester for block script call from navigator
	 */
	public static function cli_only() {
		if (!self::is_cli()){
			http_response_code(404);
			die();
		}
	}

	/**
	 * Parser of command and execute it (like clear)
	 * Must add somes commands here
	 */
	private static function execute($command) {
		switch ($command) {
			case "cls":
			case "clear":
				echo "\033[2J\033[0;0H";
				break;
			case "update":
				\Core\Database::update();
				break;
			default:
				eval($command);
		}
	}

	/**
	 * Get a input from command line;
	 */
	public static function get_line() {
		echo static::$_prompt;
		$command = stream_get_line(STDIN, 1024, PHP_EOL);
		return ($command);
	}

	/**
	 * CLI loop for handle multi command
	 */
	public static function loop() {
		self::cli_only();
		while (1) {
			try {
				self::execute(self::get_line());
				// eval(self::get_line());
			}
			catch (Throwable $e) { echo $e->getMessage() . PHP_EOL; }
		}
	}
}
