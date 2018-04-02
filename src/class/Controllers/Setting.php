<?php
/**
 * Diplodocus
 * ----------
 * @author vthomas
 * @file
 */

namespace Controllers;

 class Setting extends \Core\Table {

	public function __construct() {
		 $this->_table = "settings";
	 }

	 public function get($setting) {
		 return (parent::get(["where" => ["key" => 'key_setting', "value" => $setting]]));
	 }

	 public function set($setting, $value) {
		 $x = $this->get($setting);
		 if ($x == false || count($x) == 0){
			 return parent::insert([
				 "key_setting" => $setting,
				 "value" => $value
			 ]);
		 }
		 return (parent::update([
			 "set" => [
				 "key" => 'value',
				 "value" => $value
			 ],
			 "where" => [
				 "key" => 'key_setting',
				 "value" => $setting
			 ]
		 ]));
	 }
 }