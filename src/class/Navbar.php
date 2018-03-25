<?php
/** Diplodocus
* 	----------
*	@file
*/

class Navbar extends Component {
	protected $menu = null;

	public function __construct() {
		$this->menu = new Menu();
		$this->menu->addClass("nav");
		$this->addClass("navbar");
		$this->addClass("navbar-expand-sm");
		$this->addClass("bg-light");

		$this->addLink("test", "http://example.com");
	}

	public function addLink($text, $url) {
		$x = new Item($text, $url);
		$x->addClass("nav-item");
		$x->link()->addClass("nav-link");
		$this->menu->addItem($x);
	}

	public function render() {
		echo "<nav " . $this->class() . " " . $this->id() . ">";
		echo $this->menu->render();
		echo "</nav>";
	}
}
