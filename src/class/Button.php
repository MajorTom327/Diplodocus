<?php
/** Diplodocus
* 	----------
*	@file
*/

class Button extends Component {
	protected $element = null;

	public function __construct($element, $type = "") {
		$this->element = $element;
		$this->addClass("btn");
		$this->addClass($type);
	}

	public function render() {
		echo "<div " . $this->class() . " " . $this->id() . ">";
		echo $this->element->render();
		echo "</div>";
	}
}
