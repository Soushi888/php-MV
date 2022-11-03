<?php
// Configurations for the database connection

return [
    'database' => [
        "host" => "localhost:3307",
        "database" => "shop",
        "username" => "root",
        "password" => "root",
        "options" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];