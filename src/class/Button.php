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
		if ($this->class() == "class='btn'")
			$this->addClass('btn-default');
		echo "<div " . $this->class() . " " . $this->id() . ">";
		echo $this->element->render();
		echo "</div>";
	}
}
