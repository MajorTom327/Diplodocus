<?php
/**
 * Diplodocus
 * ----------
 * @file
 *	@author vthomas
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
      * @brief Update database from json configuration
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
        $table_update = new \Core\Table(\Core\Setting::database()['update_table']);
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
                        \Core\Table::createTable($cmd, false);
                        break;
                    case "drop-table":
                        $t = new Table($cmd['name']);
                        $t->dropTable($cmd['name']);
                        unset ($t);
                        break;
                }
            }
            $table_update->insert(["filename" => '"'.$file.'"']);
         }
     }
     

     /**
      * Querying the database
      */
     public static function query($query) {
        self::instantiate();
        $i = self::$_instance;
        $q = $i->prepare($query);
        $q->execute();
        return ($q->fetchAll());
     }
 }