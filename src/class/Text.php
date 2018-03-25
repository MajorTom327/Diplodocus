<?php
/** Diplodocus
* 	----------
*	@file
*/

class Text extends Component {
	protected $text = "";

	public function __construct($text) {
		$this->text = $text;
	}

	public function render() {
		return ($this->text);
	}
}
