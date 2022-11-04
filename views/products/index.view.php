<?php require 'views/partials/head.php' ?>
  <main>
    <h1>Products</h1>
    <div class="products">
      <?php foreach ($products as $product): ?>
        <div class="product">
          <h2><?= $product['name'] ?></h2>
          <p><?= $product['description'] ?></p>
          <p><?= $product['price'] ?>$</p>
          <a href="product?product_id=<?= $product['id'] ?>">View product</a>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
<?php require 'views/partials/footer.php' ?>