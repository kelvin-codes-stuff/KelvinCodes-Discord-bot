<?php

include_once __dir__.'/config/bootstrap.php';


class Database
{
    private static $_db = NULL;


    public static function connect(): void
    {
        global $config;
        
        if (self::$_db) throw new Exception('Database connection was already made');
        self::$_db = new PDO("mysql:host=$config->DB_HOST;dbname=$config->DB_NAME", $config->DB_USER, $config->DB_PW, [PDO::ATTR_PERSISTENT => true]);
    }
    

    public static function getConnection(): PDO {
        if(!self::$_db) throw new Exception('Database connection was not made yet');
        return self::$_db;
    }
}