<?php

// Class for the database connection
class Dbh
{
    // Database connection informations
    private $host = "localhost:3307";
    private $user = "root";
    private $pwd = "root";
    private $dbName = "shop";

    // Connect to the database
    public function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
