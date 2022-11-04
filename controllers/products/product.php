<?php
require "models/ProductsModel.php";
require "models/ReviewsModel.php";

use App\Models\ProductsModel;
use App\Models\ReviewsModel;

// Initialize the products and reviews models
$products_model = new ProductsModel($app['database']);
$reviews_model = new ReviewsModel($app['database']);

$product_id = $_GET['product_id'] ?? null; // Get the product id from the query string

if ($product_id) {
    // Get the product from the database
    $product = $products_model->getProduct($product_id);
    // If the product doesn't exist, redirect to the products page
    if (!$product) header("Location: /products");
    // Get the reviews for the product from the database
    $reviews = $reviews_model->getAllReviews($product_id);
    if ($reviews) {
        // Get the sum of all the ratings for the product from the database
        $sum_of_ratings = $reviews_model->getSumOfRatings($product_id);
        // Calculate the average rating for the product Round it to 2 decimal
        $average_rating = round($sum_of_ratings / count($reviews), 2);
    }
    // Display the product page
    $title = $product['name'];
    require "views/pages/products/product.view.php";
}
