<?php
class Dashboard extends Page {
	public function __construct() {
		parent::__construct("Dashboard", "Dashboard");
		$this->type = "html";
		$this->loadModule(new Nav());
		// $this->loadModule(new Cam());
	}

	public function body() {
	}
}
