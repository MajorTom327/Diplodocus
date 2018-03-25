<?php
class Link extends Component {
	protected $_text = "";
	protected $_url = "";

	public function __construct($text, $url) {
		$this->text($text);
		$this->url($url);
	}

	public function render() {
		return "<a href='" . $this->url() . "' " . $this->id() . " " . $this->class() . "'>" . $this->text() . "</a>";
	}

	public function text($value = "") {
		if ($value != "")
			$this->_text = $value;
		return ($this->_text);
	}

	public function url($value = "") {
		if ($value != "")
			$this->_url = $value;
		return ($this->_url);
	}
}
