<?php
require "models/ProductsModel.php";

use App\Models\ProductsModel;

// Initialize the products model
$products_model = new ProductsModel($app['database']);

$product_id = $_GET['product_id'] ?? null; // Get the product id from the query string

$product = $products_model->getProduct($product_id);
['name' => $name, 'description' => $description, 'price' => $price] = $products_model->getProduct($product_id);


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Create the product in the database and redirect to the products page
    try {
        $products_model->updateProduct($product['id'], $name, $description, $price);
        header("Location: /products");
    } catch (Exception $e) {
        // If an error occurs, display it
        $error = $e->getMessage();
    }
}

$title = 'Edit product "' . $name . '"';
require "views/pages/products/edit-product.view.php";