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

     public static function update() {
        //  \Core\Cli::cli_only();
         $update_files = scandir(\Core\Setting::main()['update-dir']);
         $update_files = array_reverse(array_filter($update_files, function ($k) {
             return (substr($k, 0, 1) != ".");
         }));
        //  array_reverse($update_files);

         foreach ($update_files as $file) {
             
             var_dump($file);
         }
     }

     public static function createTable($config) {
         $config = json_decode($config, true);
        $query = "CREATE TABLE `" . \Core\Setting::database()['base'] . "`.`" . $config['name'] . " (";
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

     protected static function query(String $query) {
         self::instantiate();
         $i = self::$_instance;
         $i->prepare($query);
         $i->execute();
     }
 }