<?php

namespace App\Repository;

class Database {
    public static function getConnection() {
        return new \PDO("mysql:host=localhost;dbname=symfony_data", "root", "Christianity1234");
    }
}