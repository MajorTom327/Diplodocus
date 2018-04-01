<?php
/** Diplodocus
* 	----------
*	@file
*/

require_once ("Module.php");

abstract class Page extends Module {
	protected $_title = "";
	protected $_module = [];
	protected $_view = "";

	public $type = "html";

	protected static $_script = [];
	protected static $_end_script = [];
	protected static $_style = [];



	/** Constructor
	*	This function create the standard page.
	*	@param $title is a string that set the Site title
	*	@param $view is the string name of the view file
	*/
	public function __construct(String $title = "", String $view = "") {
		$this->_title = $title;
		parent::__construct($view);
		$conf = Setting::main();
		try {
			foreach($conf['script_start'] as $script)
				self::add_script($script, false);
			foreach($conf['script'] as $script)
				self::add_script($script);
			foreach($conf['style'] as $style)
				self::add_style($style);
		}
		catch (Exception $e) { echo $e->getMessage(); }
	}

	/** head
	*	Generate the head with script and stylesheet
	*/
	public function head() {
		echo "<!DOCTYPE html><html><head>";
		echo "<meta charset='utf-8'>";
		echo "<title>" . $this->_title . " | "  . Setting::main()['sitename']. "</title>";
		foreach (static::$_style as $css) self::render_style($css);
		foreach (static::$_script as $script) self::render_script($script);
		echo "</head>";
	}

	/** body
	*	Abstract function for page extending Page class for render body
	*/
	abstract public function body();

	/** foot
	*	Generate the foot with script set in end
	*/
	public function foot() {
		foreach (static::$_end_script as $script) self::render_script($script);
		echo "</html>";
	}


	public function header() {
		switch ($this->type) {
			case "html":
			header('Content-Type: text/html');
			break;
			case "text":
			header('Content-Type: text/plain');
			break;
			case "json":
			header('Content-Type: application/json');
			break;
			case "pdf":
			header('Content-Type: application/pdf');
			header('Content-Disposition: attachment; filename="' . $this->_title . '"');
			break;
		}
	}
	/** render
	*	Renderize all, head, body and foot one by one
	*/
	public function render_page() {
		$this->header();
		$this->render();

		$this->head();
		echo $this->content();
		$this->body();
		$this->foot();
	}

	/** add_style
	*	Function who check style and add this for automatisation for add stylesheet
	*	@return int
	*/
	public static function add_style($css) {
		if ($css === "") throw new Exception("Cannot add an empty style");
		if (in_array($css, static::$_style))
			return ($css);
		static::$_style[] = $css;
		return (1);
	}
	/** add_script
	*	Function who check style and add this for automatisation for add stylesheet
	*	@return int
	*/
	public static function add_script($script, $at_end = true) {
		if ($script === "") throw new Exception("Cannot add an empty script");
		if (in_array($script, static::$_script) || in_array($script, static::$_end_script))
			return ($script);
		if ($at_end)
			static::$_end_script[] = $script;
		else
			static::$_script[] = $script;
		return (1);
	}

	/** render_script
	*	rendering a script beacon
	*/
	private static function render_script($script) {
		echo "<script src='$script' async></script>";
	}
	/** render_style
	*	rendering a style beacon
	*/
	private static function render_style($css) {
		echo "<link rel='stylesheet' type='text/css' href='$css'>";
	}
}
