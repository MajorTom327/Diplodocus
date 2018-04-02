<?php
/**
 * Diplodocus
 * @file
 * @author vthomas
 */

 namespace Core;
 class Table {
	protected $_table = "";

	public function __construct($table = "") {
		$this->_table = $table;
	}
	 /**
      * Create a new table from JSON data or maybe from array instance (json_decode)
      * @param $config Containe the configuration in json format or array instance
      * @param $is_encoded default true, is the type of the config payload. If true it's a JSON. Else, array
      */
	  public static function createTable($config, $is_encoded = true) {
        $config = ($is_encoded) ? json_decode($config, true) : $config;
        $query = "CREATE TABLE `" . \Core\Setting::database()['base'] . "`.`" . $config['name'] . "` (";
        $query .= "`id` INT NOT NULL AUTO_INCREMENT,";
        foreach ($config['param'] as $param) {
            $query .= "`{$param['name']}` ";
            foreach ($param['config'] as $config) {
                $query .= "" . strtoupper($config) . " ";
            }
            $query .= ", ";
        }
        $query .= "`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,";
        $query .= "`updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP,";
        $query .= "PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        self::query($query);
     }

	 /**
	  * @brief Delete a table
	  */
     public function dropTable() {
		$table = $this->_table;
        $query = "DROP TABLE `" . $table . "`";
        return (self::query($query));
	 }
	 
	 /**
	  * @brief Insert somes data in the database
	  * @param $data data to insert inside
      */
	  public function insert($data = []) {
		$table = $this->_table;
		if ($table == "")
		   return (false);
	   $query = "INSERT INTO `$table` ";
	   $keys = "`id`, ";
	   $value = "NULL, ";
	   foreach($data as $key => $val){
		   $keys .= "`" . $key. "`, ";
		   $value .= $val   . ", ";
	   }
	   $keys .= "`created_at`, `updated_at`";
	   $value .= "CURRENT_TIMESTAMP, NULL";
	   $query .= "($keys) VALUES ($value)";
	   return (\Core\Database::query($query));
	}

	public function update($data = []) {
		$table = $this->_table;
		if ($table == "")
		   return (false);
		$query = "UPDATE `" . $table . "` SET " . $this->setEqual($data['set']) . " WHERE " . $this->setEqual($data['where']);
		// "UPDATE `update_triceratops` SET `filename` = '20180402_init.jso' WHERE `update_triceratops`.`id` = 1;";
		return (\Core\Database::query($query));
	}

	private function setEqual($data) {
		$query = "`" . $data['key'] . "` = " . $data['value'];
		return ($query);
	}
 }