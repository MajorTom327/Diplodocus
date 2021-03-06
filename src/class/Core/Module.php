<?php
/** Diplodocus
 * 	----------
 *	@file
 *	@author vthomas
*/
class Module {
	protected $_view = "";
	protected $rendered = false;
	protected $content = "";
	protected $_module = [];
	protected $rendered_module = [];

	public function __construct($view) {
		$this->view($view);
	}

	public function view($view) {
		$this->_view = $view;
		if (strpos($this->_view, ".php") === false)
			$this->_view .= ".php";
	}

	/**
	 * load a module
	 * @param $module The module to load
	 * @param $name name to put in array
	 */
	public function loadModule($module, $name = "") {
		if ($name == "")
			$name = get_class($module);
		$this->_module[$name] = $module;
	}


	/**
	 * Rendering all modules
	 */
	public function renderModule() {
		foreach ($this->rendered_module as $module) { unset($module); }
		$this->rendered_module = [];
		foreach ($this->_module as $module) {
			$this->rendered_module[get_class($module)] = $module->render_view();
		}
		return ($this->rendered_module);
	}


	/**
	 * Conditional rendering
	 */
	public function ifRender($condition) {
		if ($condition)
			return ($this->render());
		return "";
	}
	/**
	 * Render View from default path
	 * default path -> pages/View
	 */
	public function render() {
		$this->rendered = false;
		ob_start();
			//RENDERING VIEW HERE
			require_once("pages/View/" . $this->_view);
			$this->content = ob_get_contents();
		ob_end_clean();
		$this->rendered = true;
		return ($this->content);
	}

	public function is_render() {
		return ($this->rendered);
	}

	public function content() {
		return ($this->content);
	}
}
