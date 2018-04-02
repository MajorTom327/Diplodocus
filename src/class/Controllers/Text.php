<?php
/**
 * Diplodocus
 * ----------
 * @author vthomas
 * @file
 */

namespace Controllers;

class Text extends \Core\Table {

	public function __construct() {
		parent::__construct("translate_text");
	}
	
	public function getLanguage($text = "", $lang = "") {
		$ret = $this->get(["where" => ["key" => "text_default", "value" => "'$text'"]]);
		if (count($ret) == 0 || $ret == false) {
			$this->insert([
				"text_default" => "'$text'",
				"langue" => "'default'",
				"value" => "'$text'"
				]);
			$ret = $this->get(["where" => ["key" => "text_default", "value" => "'$text'"]]);
		}
		if ($lang != "") {
			$t = null;
			$i = 0;
			foreach ($ret as $el) {
				if ($el['langue'] == $lang) {
					$t = $el;
					break;
				}
				if (++$i == count($ret))
					$t = $ret[0];
			}
		}
		else $t = $ret[0];
		return $t['value'];
	}
}