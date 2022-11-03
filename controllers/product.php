<?php
require "models/ProductsModel.php";
require "models/ReviewsModel.php";

use App\Models\ProductsModel;
use App\Models\ReviewsModel;

$products_model = new ProductsModel($app['database']);
$reviews_model = new ReviewsModel($app['database']);

$product_id = $_GET['id'];

if ($product_id) {
    $product = $products_model->getProduct($product_id);
    if ($product) $reviews = $reviews_model->getAllReviews($product_id);
}

require "views/product.view.php";