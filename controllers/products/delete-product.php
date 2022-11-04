<?php
require "models/ProductsModel.php";

use App\Models\ProductsModel;

// Initialize the products model
$products_model = new ProductsModel($app['database']);

$product_id = $_GET['product_id'] ?? null; // Get the product id from the query string
$product = $products_model->getProduct($product_id);
// Destructure the product array
['name' => $name, 'description' => $description, 'price' => $price,] = $products_model->getProduct($product_id);

if (isset($_POST['delete'])) {
    if ($_POST['delete'] == 'Yes') {
        $products_model->deleteProduct($product['id']);
    }
    header("Location: /products");
}

require "views/pages/products/delete-product.view.php";