<?php
// Import the files
require_once 'class/Dbh.php';
require_once 'models/ReviewsModel.php';
require_once 'models/ProductsModel.php';
require_once 'views/ReviewsView.php';
require_once 'views/ProductsView.php';

// Use the classes
use App\Models\ProductsModel;
use App\Models\ReviewsModel;
use App\Views\ProductsView;
use App\Views\ReviewsView;

// Initialize the models
$product_model = new ProductsModel();
$reviews_model = new ReviewsModel();

// Get the product id from the url
$product_id = $_GET['product_id'] ?? null;

// Initialize the variables
$product = null;
$created_review = isset($_POST['submit']) ? $_POST : null;

// Get the product and reviews from the database
$product = $product_model->getProduct($product_id);
if ($product) {
  $reviews = $reviews_model->getAllReviews($product_id);
} else {
  // If the product id is not set, redirect to the products page
  header('Location: products.php');
}

// If the user submitted the form, create the review
if ($created_review) {
  $reviews_model->createReview($product_id, $created_review['title'], $created_review['name'], $created_review['content']);
  header("Location: index.php?product_id=$product_id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Title</title>
</head>
<body>
  <nav><a href="/products.php">Products</a></nav>
  <main>
    <!--  If the product is not null, show the product -->
    <?php if ($product) : ?>
      <h1>Product number : <?= $product_id ?></h1>
      <?php ProductsView::showProduct($product); ?>

      <!--  Create Review Form -->
      <div>
        <h2>Create review</h2>
        <?php ReviewsView::createReviewForm(); ?>
      </div>

      <!--  If the reviews are not null, show the reviews -->
      <?php if (isset($reviews)) : ?>
        <div class="reviews">
          <?php ReviewsView::showReviews($reviews); ?>
        </div>
      <?php endif;
    endif; ?>
  </main>
</body>
</html>
