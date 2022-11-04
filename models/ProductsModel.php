<?php

namespace App\Models;


use PDO, Exception;

class ProductsModel
{
    // Database connection
    private $connection = null;
    // All the products
    public $products = [];

    public function __construct($connection)
    {
        $this->connection = $connection; // Set the database connection
    }

    // Get all the products
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $results = $this->connection->prepare($sql);
        $results->execute();
        $products = $results->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product) {
            $this->products[] = $product; // Add the product to the class property
        }

        return $this->products;
    }

    // Get a product by id
    public function getProduct($product_id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";
        $results = $this->connection->prepare($sql);
        $results->execute([$product_id]);
        $product = $results->fetch(PDO::FETCH_ASSOC);

        return $product;
    }

    // Create a product
    public function createProduct($name, $description, $price)
    {
        $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
        $results = $this->connection->prepare($sql);

        $this->validateProduct($name, $description, $price);

        $results->execute([$name, $description, $price]);

        return $results->insert_id;
    }

    // Update a product
    public function updateProduct($product_id, $name, $description, $price)
    {
        $sql = "UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?";
        $results = $this->connection->prepare($sql);

        $this->validateProduct($name, $description, $price);

        return $results->execute([$name, $description, $price, $product_id]);
    }

    // Delete a product
    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $results = $this->connection->prepare($sql);

        return $results->execute([$product_id]);
    }

    // validate the product
    private function validateProduct($name, $description, $price)
    {
        if ($price < 0) {
            throw new Exception("Price must be greater than 0");
        }

        if (!$name || !$description || !$price) {
            throw new Exception("All fields are required");
        }
    }
}