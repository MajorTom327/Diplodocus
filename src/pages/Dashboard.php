<?php
class Dashboard extends Page {
	public function __construct() {
		parent::__construct("Dashboard", "Dashboard");
		$this->loadModule(new Nav());
		$this->loadModule(new Cam());
	}

	public function body() {
		// var_dump($this->_module['Navbar']);
	}
}
