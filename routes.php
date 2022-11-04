<?php

// Define the routes and their corresponding controllers files
/** @var Router $router */
$router->define([
    '' => 'controllers/products/index.php',
    'products' => 'controllers/products/index.php',
    'product' => 'controllers/products/product.php',
    'product/add' => 'controllers/products/add-product.php',
    'product/edit' => 'controllers/products/edit-product.php',
    'product/delete' => 'controllers/products/delete-product.php',
    '404' => 'controllers/404.php',
]);
