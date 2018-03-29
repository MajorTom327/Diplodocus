<?php
/** Diplodocus
* 	----------
*	@file
*/

class Nav extends Module {
	protected $menu = null;

	public function __construct() {
		$this->view("Module/Navbar");
		$this->menu = new Container();
		$this->menu->add(new Navbar());

		$this->menu->get(0)->addItem(new Link(new Icon("fas fa-home"), "/dashboard"));
		$this->menu->get(0)->addLink(new Text("Home"), "/dashboard");
		$this->menu->get(0)->addLink(new Text("Empty"), "/");
		$this->menu->get(0)->addLink(new Text("404"), "/404");

		$this->menu->add(new Button(new Text("TEST")));
		// $this->menu->addItem(new Button(new Text("Test"), "danger"));
	}

	public function render() {
		ob_start();
		echo $this->menu->render();
		$content = ob_get_contents();
		ob_end_clean();
		return ($content);
	}
}
