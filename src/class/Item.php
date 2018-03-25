<?php
/** Diplodocus
* 	----------
*	@file
*/

class Item extends Component {
	protected $link = null;

	public function __construct($text, $url) {
		$this->link = new Link($text, $url);
	}

	public function render() {
		$str = "";
		ob_start();
			echo "<li " . $this->class() . " " . $this->id() . ">";
			echo $this->link->render();
			echo "</li>";
		$str = ob_get_contents();
		ob_end_clean();
		return $str;
	}

	public function link($link = null) {
		if ($link != null)
			$this->link = $link;
		return ($this->link);
	}
}
