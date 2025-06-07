<?php

interface IDbConnector {
    public static function connect($host, $username, $password, $database, $port = 3306);
    public static function disconnect();
    public static function close();
} 