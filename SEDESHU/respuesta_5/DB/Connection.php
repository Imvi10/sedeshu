<?php

class Connection {

    private static $objInstance;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public static function getInstance() {
        if (!self::$objInstance) {
            self::$objInstance = new PDO("mysql:host=localhost;dbname=sedeshu;charset=UTF8", "root", "");
            self::$objInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$objInstance;
    }

}

?>