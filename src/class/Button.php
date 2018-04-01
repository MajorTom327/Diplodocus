<?php
/** Diplodocus
* 	----------
*	@file
*/

class Button extends Component {

	public function __construct($element, $type = "") {
		$this->element = $element;
		$this->addClass("btn");
		$this->addClass($type);
		$this->balise = "div";
	}

	public function render() {
		if ($this->class() == "class='btn'")
			$this->addClass('btn-default');
		echo parent::render();
	}
}
