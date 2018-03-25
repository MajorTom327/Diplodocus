<?php
/** Diplodocus
* 	----------
*	@file
*/

class Navbar extends Component {
	protected $menu = null;

	/**
	 * Setting up a navbar
	 */
	public function __construct() {
		$this->menu = new Menu();
		$this->menu->addClass("nav");
		$this->addClass("navbar");
		$this->addClass("navbar-expand-sm");
		$this->addClass("bg-light");

		$this->addLink("test", "http://example.com");
	}

	/**
	 * Add link to navbar
	 */
	public function addLink($text, $url) {
		$x = new Item(new Link($text, $url));
		$x->addClass("nav-item");
		$x->element()->addClass("nav-link");
		$this->menu->addItem($x);
	}

	/**
	 * rendering the nav
	 */
	public function render() {
		echo "<nav " . $this->class() . " " . $this->id() . ">";
		echo $this->menu->render();
		echo "</nav>";
	}
}
