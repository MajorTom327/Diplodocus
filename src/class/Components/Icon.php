<?php
/** Diplodocus
* 	----------
*	@author vthomas
*	@file
*/

namespace Components;

class Icon extends \Core\Component {
	public function __construct($icon = "") {
		$this->balise = "i";
		$x = explode(' ', $icon);
		forEach($x as $class)
			$this->addClass($class);
	}

	public function render() {
		return parent::render();
	}
}
