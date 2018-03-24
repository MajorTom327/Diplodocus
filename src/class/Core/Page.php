<?php
class Page {
	protected $_title = "";
	private static $_script = [];
	private static $_end_script = [];
	private static  $_style = [];

	public function __construct($title = "") {
		$this->$_title = $title;
	}

	public function head() {
		echo "<!DOCTYPE><html><head>";
		echo "<title>" . $this->$_title . "</title>";
		foreach (static::$_style as $css) self::render_style($css);
		foreach (static::$_script as $script) self::render_script($script);
		echo "</head>";
	}

	abstract public function body() {
	}

	public function foot() {
		foreach (static::$_end_script as $script) self::render_script($script);
		echo "</html>";
	}

	public function render() {
		$this->head();
		$this->body();
		$this->foot();
	}

/** add_style
* Function who check style and add this for automatisation for add stylesheet
* @return int
*/
	public static function add_style($css) {
		if (in_array($css, static::$_style))
			throw new Exception("You add style twice: " . $css);
		static::$_style[] = $css;
		return (1);
	}
/** add_script
* Function who check style and add this for automatisation for add stylesheet
* @return int
*/
	public static function add_script($script, $at_end = true) {
		if (in_array($script, static::$_script) || in_array($script, static::$_end_script))
			throw new Exception("You add a script twice: " . $script);
		if ($at_end)
			static::$_end_script[] = $script;
		else
			static::$_script[] = $script;
		return (1);
	}

	private static function render_script($script) {
		echo "<script type='text/javascript' src='$script'></script>";
	}
	private static function render_style($css) {
		echo "<link rel='stylesheet' type='text/css' href='$css'>";
	}
}
