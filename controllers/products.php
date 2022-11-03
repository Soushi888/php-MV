<?php
require "models/ProductsModel.php";

use App\Models\ProductsModel;

$products = new ProductsModel($app['database']);
$products = $products->getAllProducts();

require "views/products.view.php";