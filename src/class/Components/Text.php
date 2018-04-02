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
		return ($this->getLanguage());
	}

	public function getLanguage() {
		$t = new \Controllers\Text();
		return ($t->getLanguage($this->text, "en"));
	}
}
