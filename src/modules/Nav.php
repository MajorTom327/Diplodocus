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
		$this->menu->addLink("Home", "/dashboard");
		$this->menu->addLink("Empty", "/");
		$this->menu->addLink("404", "/404");
	}

	public function render() {
		return ($this->menu->render());
	}
}
