<?php
require "models/ReviewsModel.php";
require "models/ProductsModel.php";

use App\Models\ReviewsModel;
use App\Models\ProductsModel;

// Initialize the models
$reviews_model = new ReviewsModel($app['database']);
$products_model = new ProductsModel($app['database']);

$review_id = $_GET['review_id'] ?? null; // Get the review id from the query string
$review = $reviews_model->getReview($review_id);
$product_id = $review['product_id'];
$product = $products_model->getProduct($product_id);

if (isset($_POST['delete'])) {
    if ($_POST['delete'] == 'Yes') {
        $reviews_model->deleteReview($review_id);
    }
    header("Location: /product?product_id=$product_id");
}

require "views/pages/reviews/delete-review.view.php";