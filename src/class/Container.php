<?php
class Container extends Component {
	private $_elements = [];

	public function __construct(){
		$this->addClass("container");
	}

	public function add($item) {
		$this->_elements[] = $item;
	}

	public function render() {
		ob_start();

		echo "<div " .$this->id() . " " . $this->class() . ">";
		foreach ($this->_elements as $element) {
			$element->render();
		}
		echo "</div>";
		$ret = ob_get_contents();
		ob_end_clean();
		return ($ret);
	}

	public function get($id) {
		if (!isset($this->_elements[$id]))
			throw new Exception("index not found");
		return ($this->_elements[$id]);
	}

}
