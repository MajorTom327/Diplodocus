<?php
class Menu extends Component {
	protected $menu = [];

	public function __construct() {}

	public function addItem($item) {
		$this->menu[] = $item;
	}

	public function render() {
		$ret = "";
		ob_start();
			echo "<ul " . $this->class() . " " . $this->id() . ">";
			foreach ($this->menu as $item) {
				echo $item->render();
			}
			echo "</ul>";
			$ret = ob_get_contents();
		ob_end_clean();
		return ($ret);
	}
}
