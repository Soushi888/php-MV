<?php
require "models/ProductsModel.php";
require "models/ReviewsModel.php";

use App\Models\ProductsModel;
use App\Models\ReviewsModel;

// Initialize the products and reviews models
$products_model = new ProductsModel($app['database']);
$reviews_model = new ReviewsModel($app['database']);

$product_id = $_GET['id'] ?? null; // Get the product id from the query string

if ($product_id) {
    // Get the product from the database
    $product = $products_model->getProduct($product_id);
    if ($product) {
        // Get the reviews for the product from the database
        $reviews = $reviews_model->getAllReviews($product_id);
        // Display the product page
        require "views/product.view.php";
    }
} else { // If the product id is not set, redirect to the products page
    header("Location: /products");
}

// If the form is submitted
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $content = $_POST['content'];

    // Create the review in the database and redirect to the product page
    $reviews_model->createReview($product_id, $title, $name, $content);
    header("Location: /product?id=$product_id");
}