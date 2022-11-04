<?php
require "models/ReviewsModel.php";
require "models/ProductsModel.php";

use App\Models\ReviewsModel;
use App\Models\ProductsModel;

// Initialize the reviews model
$reviews_model = new ReviewsModel($app['database']);
$products_model = new ProductsModel($app['database']);

$review_id = $_GET['review_id'] ?? null; // Get the review id from the query string
$review = $reviews_model->getReview($review_id);

// If the review doesn't exist, redirect to the home page
if (!$review) header("Location: /");

$product_id = $review['product_id'];
$product = $products_model->getProduct($product_id);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];

    // Update the review in the database and redirect to the reviews page
    try {
        $reviews_model->updateReview($review_id, $title, $name, $rating, $content);
        header("Location: /product?product_id=$product_id");
    } catch (Exception $e) {
        // If an error occurs, display it
        $error = $e->getMessage();
    }
}

require "views/pages/reviews/edit-review.view.php";