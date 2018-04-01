<?php
/** Diplodocus
* 	----------
*	@file
*/

class Menu extends Component {
	protected $menu = [];

	public function __construct() {}

	/**
	 * Menu Ul
	 */
	public function addItem($item) {
		$this->menu[] = $item;
	}

	/**
	 * Rendering the ul list
	 */
	public function render() {
		$ret = "";
		ob_start();
			echo $this->getBalise()[0];
			foreach ($this->menu as $item) {
				echo $item->render();
			}
			echo $this->getBalise()[1];
			$ret = ob_get_contents();
		ob_end_clean();
		return ($ret);
	}
}
