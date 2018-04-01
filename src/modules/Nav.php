<?php
/** Diplodocus
* 	----------
*	@file
*/

class Nav extends Module {
	protected $menu = null;

	public function __construct() {
		$this->view("Module/Navbar");
		$this->element = new Container();
		$this->element->add(new Navbar());

		$this->element->get(0)->addItem(new Link(new Icon("fas fa-home"), "/dashboard"));
		$this->element->get(0)->addLink(new Text("Home"), "/dashboard");
		$this->element->get(0)->addLink(new Text("Empty"), "/");
		$this->element->get(0)->addLink(new Text("404"), "/404");

		// $this->element->add(new Button(new Text("TEST Gauche"), "btn-success"));
		// $this->element->add(new Button(new Text("TEST Droite"), "btn-danger"));
		// $this->element->addItem(new Button(new Text("Test"), "danger"));
	}

	public function render() {
		ob_start();
		echo $this->element->render();
		$content = ob_get_contents();
		ob_end_clean();
		return ($content);
	}
}
