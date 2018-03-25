<?php
class Dashboard extends Page {
	public function __construct() {
		parent::__construct("Dashboard", "Dashboard");
		$this->loadModule(new Navbar());
	}

	public function body() {
	}
}
