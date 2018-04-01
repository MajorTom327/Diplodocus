<?php
/** Diplodocus
* 	----------
*	@file
*/

class Item extends Component {
	protected $element = null;

	public function __construct($element) {
		// $this->element = new Link($text, $url);
		$this->balise = "li";
		$this->element = $element;
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
