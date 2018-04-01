<?php
class Container extends Component {

	public function __construct($is_main = false){
		$this->balise = "div";
		$this->addClass("container");
		if ($is_main)
			$this->addClass("main-container");
	}

	public function add($item) {
		$this->elements[] = $item;
		return array_search($item, $this->elements);
	}

	public function render() {
		ob_start();
		echo $this->getBalise()[0];
		foreach ($this->elements as $element) {
			echo $element->render();
		}
		echo $this->getBalise()[1];
		$ret = ob_get_contents();
		ob_end_clean();
		return ($ret);
	}


	public function get($id) {
		if (!isset($this->elements[$id]))
			throw new Exception("index not found");
		return ($this->elements[$id]);
	}

}
