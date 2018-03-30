<?php
/** Diplodocus
* 	----------
*	@file
*/

class Cam extends Module {
	protected $content = null;

	public function __construct() {
		$this->view("Module/Cam.php");
		$this->content = new Container(true);


		$this->content->add(new Button(new Text("TEST Gauche"), "btn-success"));
		// $this->menu->add(new Button(new Text("TEST Droite"), "btn-danger"));
		// $this->menu->addItem(new Button(new Text("Test"), "danger"));
	}

	public function render() {
		ob_start();
		echo $this->content->render();
		$content = ob_get_contents();
		ob_end_clean();
		return ($content);
	}
}
