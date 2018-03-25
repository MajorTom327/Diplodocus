<?php
/** Diplodocus
* 	----------
*	@file
*/

class Navbar extends Module {
	protected $menu = null;

	public function __construct() {
		$this->view("Module/Navbar");
	}
}
