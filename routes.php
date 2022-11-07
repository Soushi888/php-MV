<?php

// Define the routes and their corresponding controllers files
/** @var Router $router */
$router->define([
    '' => 'controllers/products/show-products.php',
    'products' => 'controllers/products/show-products.php',
    'product' => 'controllers/products/product.php',
    'product/add' => 'controllers/products/add-product.php',
    'product/edit' => 'controllers/products/edit-product.php',
    'product/delete' => 'controllers/products/delete-product.php',
    'review/add' => 'controllers/reviews/add-review.php',
    'review/edit' => 'controllers/reviews/edit-review.php',
    'review/delete' => 'controllers/reviews/delete-review.php',
    '404' => 'controllers/404.php',
]);
