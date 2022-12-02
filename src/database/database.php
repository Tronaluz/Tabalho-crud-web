<?php

class Database {
    public function getDatabase() {
        $env = parse_ini_file('.env');
        $user = $env["USER_MYSQL"];
        $pass = $env["PASSWORD_MYSQL"];
        $connectionString = "mysql:host=localhost;dbname=pelegras";
        $db = new PDO($connectionString, $user, $pass);
        $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        return $db;
    }
}