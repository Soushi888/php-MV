<?php
require "models/ProductsModel.php";

use App\Models\ProductsModel;

// Initialize the products model
$products = new ProductsModel($app['database']);
// Get all the products from the database
$products = $products->getAllProducts();

// Display the products page
require "views/products.view.php";