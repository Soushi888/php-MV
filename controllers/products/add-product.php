<?php
require "models/ProductsModel.php";

use App\Models\ProductsModel;


// Initialize the products model
$products_model = new ProductsModel($app['database']);


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Create the product in the database and redirect to the products page
    try {
        $products_model->createProduct($name, $description, $price);
        header("Location: /products");
    } catch (Exception $e) {
        // If an error occurs, display it
        $error = $e->getMessage();
    }
}

require "views/pages//add-product.view.php";