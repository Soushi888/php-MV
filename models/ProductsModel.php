<?php

namespace App\Models;

use Dbh;

class ProductsModel extends Dbh
{
    // All the products
    public $products = [];

    // Get all the products
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $results = $this->connect()->prepare($sql);
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
        $this->connect();
        $sql = "SELECT * FROM products WHERE id = ?";
        $results = $this->connect()->prepare($sql);
        $results->execute([$product_id]);
        $product = $results->fetch();

        return $product;
    }
}