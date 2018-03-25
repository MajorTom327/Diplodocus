<?php
/** Diplodocus
* 	----------
*	@file
*/

class Component {
	protected $className = [];
	protected $id = "";
	protected $balise = "";
	protected $element = null;

	/**
	 * Add a class to element
	 */
	public function addClass($class) {
		if (in_array($class, $this->className))
			throw new Exception("Class " . $class . " already in list");
		if ($class != "")
			$this->className[] = $class;
	}

	/**
	 * Remove a class to element
	 */
	public function removeClass($class) {
		if (!in_array($this->className, $class))
			throw new Exception("Class " . $class . " not in the list");

		unset($this->className[array_search($class, $this->className)]);
	}

	/**
	 * Set id of element or print id="id"
	 */
	public function id($id = "") {
		if ($id != "")
			$this->id = $id;
		if ($this->id != "")
			return "id='" . trim($this->id) . "'";
		return "";
	}

	/**
	 * Print class
	 */
	public function class() {
		$str = "";
		foreach ($this->className as $class) {
			$str .= $class . " ";
		}
		if ($str != "")
			return ("class='" . trim($str) . "'");
		return "";
	}

	public function element($element = null) {
		if ($element != null)
			$this->element = $element;
		return ($this->element);
	}

	// public function render() {
	// 	$text = "";
	// 	ob_start();
	// 		echo "<" . $this->balise . " " . $this->class() . " " . $this->id() . ">";
	// 		echo "</" . $this->balise . ">";
	// 		$text = ob_get_contents();
	// 	ob_end_clean();
	// 	return ($text);
	// }
}
