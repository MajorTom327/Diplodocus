<?php
/**
 * Diplodocus
 * ----------
 * @file
 */

 namespace Core;
 class Database {
     protected static $_instance = NULL;

     public static function instantiate() {
         if (self::$_instance === NULL) {
             try {
                $config = \Core\Setting::database();
                self::$_instance = new \PDO("mysql:host={$config['host']};dbname={$config['base']};charset=utf8", $config['user'], $config['pass']);
            }
            catch (Exception $e) {
                echo $e->getMessage();
                die();
             }
         }
     }

     /**
      * Update database from json configuration
      */
     public static function update() {
         $update_files = scandir(\Core\Setting::main()['update-dir']);
         $update_files = array_reverse(array_filter($update_files, function ($k) {
             return (substr($k, 0, 1) != ".");
         }));
        //  array_reverse($update_files);

        $data = self::query("SELECT * FROM `update_triceratops`");
        if ($data === false){
            echo "CREATE TABLE" . PHP_EOL;
            self::createTable('{"type":"create_table","name":"update_triceratops","param":[{"name": "filename","config": ["text", "not", "null"]}]}');
            $data = self::query("SELECT * FROM `" . \Core\Setting::database()['update_table'] . "`");
        }
         foreach ($update_files as $file) {
             $is_in = false;
             foreach ($data as $el) {
                 if ($el[0]['filename'] == $file) {
                     $is_in = true;
                     break;
                }
            }
            if ($is_in) break;
            $x = json_decode(file_get_contents(\Core\Setting::main()['update-dir'] . "/" . $file), true);
            if ($x === NULL)
                continue;
            foreach ($x as $cmd) {
                switch ($cmd["type"]) {
                    case "create-table":
                        self::createTable($cmd, false);
                        break;
                    case "drop-table":
                        self::dropTable($cmd['name']);
                        break;
                }
            }
            self::insert(\Core\Setting::database()['update_table'], ["filename" => '"'.$file.'"']);
         }
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

     public static function dropTable($table) {
         $query = "DROP TABLE `" . $table . "`";
         return (self::query($query));
     }

     /**
      * Insert somes data in the database
      */
     public static function insert($table = "", $data = []) {
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
        return (self::query($query));
     }
     /**
      * Querying the database
      */
     public static function query($query) {
        self::instantiate();
        $i = self::$_instance;
        $q = $i->prepare($query);
        $q->execute();
        return ($q->fetchAll(\PDO::FETCH_GROUP));
     }
 }