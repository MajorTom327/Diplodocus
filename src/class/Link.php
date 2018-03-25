<?php
/** Diplodocus
* 	----------
*	@file
*/

class Link extends Component {
	protected $_text = "";
	protected $_url = "";

	/**
	 * Generate a link balise
	 */
	public function __construct($text, $url) {
		$this->text($text);
		$this->url($url);
	}

	/**
	 * Rendering the link
	 */
	public function render() {
		return "<a href='" . $this->url() . "' " . $this->id() . " " . $this->class() . "'>" . $this->text() . "</a>";
	}

	/**
	 * Setter and getter for the text value
	 */
	public function text($value = "") {
		if ($value != "")
			$this->_text = $value;
		return ($this->_text);
	}

	/**
	 * Setter and getter for the url value
	 */
	public function url($value = "") {
		if ($value != "")
			$this->_url = $value;
		return ($this->_url);
	}
}
