<?php

namespace App\Models;


class ProductsModel
{
    // All the products
    public $products = [];
    private $connection = null;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    // Get all the products
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $results = $this->connection->prepare($sql);
        $results->execute();
        $products = $results->fetchAll();

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
        $product = $results->fetch();

        return $product;
    }
}