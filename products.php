<?php
// Import the files
require_once 'class/Dbh.php';
require_once 'models/ProductsModel.php';
require_once 'views/ProductsView.php';

// Use the classes
use App\Models\ProductsModel;
use App\Views\ProductsView;

// Initialize the model
$product_model = new ProductsModel();
// Get the products from the database
$products = $product_model->getAllProducts(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Title</title>
</head>
<body>
    <main>
    <h1>Products</h1>
    <div class="products">
        <!--  Show the products -->
        <?php ProductsView::showProducts($products); ?>
    </div>
</body>
</html>