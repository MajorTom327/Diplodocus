<?php
class Dashboard extends Page {
	public function __construct() {
		parent::__construct("Dashboard", "Dashboard.php");
	}

	public function body() {
		$this->render_view();
	}
}
