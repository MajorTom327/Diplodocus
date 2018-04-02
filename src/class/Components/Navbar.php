<?php
/** Diplodocus
* 	----------
*	@author vthomas
*	@file
*/

namespace Components;

class Navbar extends \Core\Component {

	/**
	 * Setting up a navbar
	 */
	public function __construct() {
		$this->balise = "nav";
		$this->element = new Menu();
		$this->element->addClass("nav");
		$this->addClass("navbar");
		$this->addClass("navbar-expand-sm");
		$this->addClass("bg-light");

		// $this->addLink("Home", "/dashboard");
	}

	public function addItem($item) {
		$this->element->addItem(new Item($item));
	}
	/**
	 * Add link to navbar
	 */
	public function addLink($text, $url) {
		$x = new Item(new Link($text, $url));
		$x->addClass("nav-item");
		$x->element()->addClass("nav-link");
		$this->element->addItem($x);
	}

	/**
	 * rendering the nav
	 */
	public function render() {
		echo parent::render();
		// echo "<nav " . $this->class() . " " . $this->id() . ">";
		// echo $this->element->render();
		// echo "</nav>";
	}

	public function menu($menu = null) {
		if ($menu != null)
			$this->element = $menu;
		return ($this->element);
	}
}
