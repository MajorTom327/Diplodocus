<?php
class Module {
	protected $_view = "";
	protected $rendered = false;
	protected $content = "";

	public function __construct($view) {
		$this->_view = $view;
	}

	public function render() {
		self::$rendered = false;
		ob_start();
			//RENDERING VIEW
			self::$content = ob_get_contents();
		ob_end_clean();
		self::$rendered = true;
		return (self::$content);
	}

	public function is_render() {
		return (self::$rendered);
	}

	public function content() {
		return (self::$content);
	}
}
