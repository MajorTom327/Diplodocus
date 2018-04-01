<?php
/** Diplodocus
* 	----------
*	@file
*/

namespace Components;

class Text extends \Core\Component {

	public function __construct($text) {
		$this->text = $text;
	}

	public function render() {
		return ($this->text);
	}
}
