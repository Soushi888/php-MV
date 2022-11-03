<?php

namespace database;

use PDO;
use PDOException;

// Database connection class
class Connection
{
    // Create a new database connection
    public static function make($config)
    {
        try { // Try to connect to the database
            return new PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['database'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) { // If the connection fails, throw an error
             throw new PDOException($e->getMessage());
        }
    }
}