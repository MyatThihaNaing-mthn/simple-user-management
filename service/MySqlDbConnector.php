<?php
require_once __DIR__ . '/../interface/IDbConnector.php';
require_once __DIR__ . '/../config/Config.php';

/**
 * Temp db credentials
 */

// define('DB_SERVER', $_ENV['DB_SERVER']);
// define('DB_USERNAME', $_ENV['DB_USERNAME']);
// define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
// define('DB_NAME', $_ENV['DB_NAME']);



class MySqlDbConnector implements IDbConnector {
    private static mysqli $conn;

    public function __construct() {
    }

    public static function connect(
        $host, $username, $password, $database, $port = 3306, $socket = null
    ) {
        self::$conn = new mysqli($host, $username, $password, $database, $port);
        
        if (self::$conn->connect_error) {
            throw new Exception("Connection failed: " . self::$conn->connect_error);
        }
        
        return self::$conn;
    }

    public static function disconnect() {
        if (isset(self::$conn)) {
            self::$conn->close();
        }
    }
    
    public static function close() {
        if (isset(self::$conn)) {
            self::$conn->close();
        }
    }
}