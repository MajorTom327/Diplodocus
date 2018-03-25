<?php
/** Diplodocus
* 	----------
*	@file
*/
abstract class Page {
	protected $_title = "";
	protected $_module = [];
	protected $_view = "";

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
		$this->_view = $view;
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
		echo "<!DOCTYPE><html><head>";
		echo "<meta charset='utf8'></meta>";
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

	/** render
	*	Renderize all, head, body and foot one by one
	*/
	public function render() {
		$this->head();
		$this->body();
		$this->foot();
	}

	/** add_style
	*	Function who check style and add this for automatisation for add stylesheet
	*	@return int
	*/
	public static function add_style($css) {
		if ($script === "") throw new Exception("Cannot add an empty style");
		if (in_array($css, static::$_style))
			throw new Exception("You add style twice: " . $css);
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
			throw new Exception("You add a script twice: " . $script);
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
		echo "<script type='text/javascript' src='$script'></script>";
	}
	/** render_style
	*	rendering a style beacon
	*/
	private static function render_style($css) {
		echo "<link rel='stylesheet' type='text/css' href='$css'>";
	}
}
