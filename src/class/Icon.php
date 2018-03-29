<?php
class Icon extends Component {
	public function __construct($icon = "") {
		$x = explode(' ', $icon);
		forEach($x as $class)
			$this->addClass($class);
	}

	public function render() {
		return ("<i " . $this->id() . " " . $this->class() . "></i>");
	}
}
