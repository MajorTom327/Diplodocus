<?php
/** Diplodocus
* 	----------
*	@file
*/

class Component {
	protected $className = [];///Lists of class
	protected $id = "";///Element id (Without <)
	protected $balise = "";
	protected $no_close = false;
	protected $data = [];
	protected $element = null;
	protected $text = "";

	public function render() {
		$balise = $matches[0][1];
		ob_start();
		echo $this->getBalise()[0];
		if ($this->element !== NULL)
			echo $this->element->render();
		else echo $this->text;
		echo $this->getBalise()[1];
		$rendered = ob_get_contents();
		ob_end_clean();
		return ($rendered);
	}

	protected function getBalise() {
		$re = '/(?:<?)([\w-]*)(?:>?)/';
		$rendered = "";
		
		$balise = $this->balise;
		preg_match_all($re, $balise, $matches, PREG_SET_ORDER, 0);
		$balise = $matches[0][1];
		$ret = [];
		$t = trim($balise." ".$this->class()." ".$this->id().($this->no_close ? "/" : ""));
		$t = trim(preg_replace('/\ +/', ' ', $t));
		$ret[0] =  "<" . $t . ">";
		$ret[1] = ($this->no_close ? "" : "</".$balise.">");
		return $ret;
	}

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
}
