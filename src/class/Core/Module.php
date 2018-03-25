<?php
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

	public function loadModule($module) {
		$this->_module[get_class($module)] = $module;
	}

	public function renderModule() {
		foreach ($this->rendered_module as $module) { unset($module); }
		$this->rendered_module = [];
		foreach ($this->_module as $module) {
			$this->rendered_module[get_class($module)] = $module->render_view();
		}
		return ($this->rendered_module);
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
