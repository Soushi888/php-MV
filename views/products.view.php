<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../style.css">
  <title>Products</title>
</head>
<body>
  <main>
    <h1>Products</h1>
    <div class="products">
      <?php foreach ($products as $product): ?>
        <div class="product">
          <h2><?= $product['name'] ?></h2>
          <p><?= $product['description'] ?></p>
          <p><?= $product['price'] ?>$</p>
          <a href="product?id=<?= $product['id'] ?>">View product</a>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>