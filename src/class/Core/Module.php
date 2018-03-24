<?php
abstract class Module {
	public function __construct() {
		$this->execute();
	}

	public abstract function execute();
}
