<?php

namespace App\Views;

class ProductsView
{
  // Show all the products given in the parameter
  // Use static to call the function without creating an instance of the class
  static function showProducts($products)
  {
    if (isset($products)) {
      foreach ($products as $product) { ?>
        <div class="product">
          <h3><?= $product['name']; ?></h3>
          <p><?= $product['description']; ?></p>
          <p><?= $product['price']; ?></p>
          <a href="index.php?product_id=<?= $product['id']; ?>">View Reviews</a>
        </div>
      <?php }
    }
  }

  // Show the product given in the parameter
  static function showProduct($product)
  {
    if (isset($product)) { ?>
      <div class="product">
        <h3><?= $product['name']; ?></h3>
        <p><?= $product['description']; ?></p>
        <p><?= $product['price']; ?>$</p>
      </div>
    <?php }
  }
}