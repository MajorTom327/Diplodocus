<?php
/** Diplodocus
* 	----------
*	@file
*/

class Nav extends Module {
	protected $menu = null;

	public function __construct() {
		$this->menu = new Navbar();
		$this->view("Module/Navbar");
		$this->menu->addItem(new Icon("fas fa-home"));
		$this->menu->addLink("Home", "/dashboard");
		$this->menu->addLink("Empty", "/");
		$this->menu->addLink("404", "/404");
	}

	public function render() {
		ob_start();
		$t = new Button(new Text("TEST"));
		$t->addClass("btn-danger");
		// echo $t->render();
		$this->menu->render();
		$content = ob_get_contents();
		ob_end_clean();
		return ($content);
	}
}
