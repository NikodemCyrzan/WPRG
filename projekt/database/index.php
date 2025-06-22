<?php

namespace Database;

class DatabaseConnection
{
    private static $isConnected = false;
    public static $instance = null;

    public static function isConnected(): bool
    {
        return self::$isConnected;
    }

    public static function connect()
    {
        if (self::$isConnected) {
            return true;
        }

        $host = 'localhost';
        $dbName = 'your_database_name';
        $username = 'your_username';
        $password = 'your_password';

        try {
            self::$instance = new \PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $username, $password);
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$isConnected = true;
            return true;
        } catch (\PDOException $e) {
            return $e;
        }
    }
}
