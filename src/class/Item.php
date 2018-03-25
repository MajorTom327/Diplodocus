<?php
/** Diplodocus
* 	----------
*	@file
*/

class Item extends Component {
	protected $element = null;

	public function __construct($element) {
		// $this->element = new Link($text, $url);
		$this->element = $element;
	}

	/**
	 * Render a list item
	 */
	public function render() {
		$str = "";
		ob_start();
			echo "<li " . $this->class() . " " . $this->id() . ">";
			echo $this->element->render();
			echo "</li>";
		$str = ob_get_contents();
		ob_end_clean();
		return $str;
	}

	/**
	 * Get link
	 */
	public function element($element = null) {
		if ($element != null)
			$this->element = $element;
		return ($this->element);
	}
}
