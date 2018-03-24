<?php
class Route {
	protected $_uri = "";
	protected $_page = null;

	public function __constructor($uri, $page) {
		$this->$_uri = $uri;
		$this->$_page = $page;
	}

	public function uri($value = "") {
		if ($value !== "")
			$this->_uri = $value;
		return ($this->uri);
	}

	public function page($value = null) {
		if ($value !== null)
		{
			unset ($this->_page);
			$this->_page = $value;
		}
		return ($this->_page);
	}
}

class Get extends Route {
}

class Post extends Route {
}

class Delete extends Route {
}

class Put extends Route {
}
