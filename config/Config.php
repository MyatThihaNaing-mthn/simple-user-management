<?php


class Config
{
    public static function load()
    {
        // read .env file
        $envFile = __DIR__ . '/../.env.dev';

        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
                    list($key, $value) = explode('=', $line, 2);
                    putenv("$key=$value");
                }
            }
        }
    }
}

Config::load();

// Define database constants
define('DB_SERVER', getenv('DB_SERVER') ?: 'localhost');
define('DB_USERNAME', getenv('DB_USERNAME') ?: 'root');
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'user_management');
