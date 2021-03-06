<?php
/** Diplodocus
 * 	----------
 *	@file
 *	@author vthomas
*/

class Nav extends Module {
	protected $menu = null;

	public function __construct() {
		$this->view("Module/Navbar");
		$this->element = new \Components\Container();
		$this->element->add(new \Components\Navbar());

		$this->element->get(0)->addItem(new \Components\Link(new \Components\Icon("fas fa-home"), "/dashboard"));
		$this->element->get(0)->addLink(new \Components\Text("Home"), "/dashboard");
		$this->element->get(0)->addLink(new \Components\Text("Empty"), "/");
		$this->element->get(0)->addLink(new \Components\Text("404"), "/404");

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
