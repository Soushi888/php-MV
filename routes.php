<?php

/** @var Router $router */
$router->define([
    '' => 'controllers\products.php',
    'products' => 'controllers\products.php',
    'product' => 'controllers\product.php',
    '404' => 'controllers\404.php',
]);