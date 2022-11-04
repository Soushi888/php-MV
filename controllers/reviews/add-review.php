<?php
require "models/ReviewsModel.php";
require "models/ProductsModel.php";

use App\Models\ReviewsModel;
use App\Models\ProductsModel;

// Initialize the reviews model

$reviews_model = new ReviewsModel($app['database']);
$products_model = new ProductsModel($app['database']);

$product_id = $_GET['product_id'];
['name' => $product_name, 'description' => $description, 'price' => $price] = $products_model->getProduct($product_id);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $name = $_POST['name'];
    $rating = $_POST['rating'];
    $content = $_POST['content'];

    // Create the review in the database and redirect to the reviews page
    try {
        $reviews_model->createReview($product_id, $title, $name, $rating, $content);
        header("Location: /product?product_id=$product_id");
    } catch (Exception $e) {
        // If an error occurs, display it
        $error = $e->getMessage();
    }
}

require "views/pages/reviews/add-review.view.php";