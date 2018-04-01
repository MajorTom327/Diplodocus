<?php
/** Diplodocus
* 	----------
*	@file
*/

class Text extends Component {

	public function __construct($text) {
		$this->text = $text;
	}

	public function render() {
		return ($this->text);
	}
}
