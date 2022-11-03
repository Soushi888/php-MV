<?php

namespace database;

use PDO;
use PDOException;

class Connection
{
    public static function make($config)
    {
        try {
            return new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['database'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}