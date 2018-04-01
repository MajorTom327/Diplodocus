<?php
/** Diplodocus
* 	----------
*	@file
*/

namespace Components;

class Link extends \Core\Component {
	protected $_text = "";
	protected $_item = null;
	protected $_url = "";

	/**
	 * Generate a link balise
	 */
	public function __construct($item, $url, $text = "") {
		$this->item($item);
		$this->url($url);
		$this->text($text);
	}

	/**
	 * Rendering the link
	 */
	public function render() {
		try {
			if ($this->item() === null)
				throw new Exception("Item is null");
			return "<a href=\"" . $this->url() . "\" " . $this->id() . " " . $this->class() . ">" . $this->item()->render() . "</a>";
		}
		catch (Exception $e) {
			return "<a href=\"" . $this->url() . "\" " . $this->id() . " " . $this->class() . ">" . $this->text() . "</a>";
		}
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
	 * Setter and getter for the text value
	 */
	public function item($value = "") {
		if ($value != "")
			$this->_item = $value;
		return ($this->_item);
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
