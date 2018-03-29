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
		$this->menu->addItem(new Link(new Icon("fas fa-home"), "/dashboard"));
		$this->menu->addLink(new Text("Home"), "/dashboard");
		$this->menu->addLink(new Text("Empty"), "/");
		$this->menu->addLink(new Text("404"), "/404");
		// $this->menu->addItem(new Button(new Text("Test"), "danger"));
	}

	public function render() {
		ob_start();
		$t = new Button(new Icon("fas fa-home"), "btn-success");
		// $t->addClass("btn-danger");
		echo $t->render();
		$this->menu->render();
		$content = ob_get_contents();
		ob_end_clean();
		return ($content);
	}
}
