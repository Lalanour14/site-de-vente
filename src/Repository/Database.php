<?php

namespace App\Repository;

class Database {
    public static function getConnection() {
        return new \PDO("mysql:host=localhost;dbname=db_sql", "root", "1234");
    }
}