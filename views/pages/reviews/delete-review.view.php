<?php require "views/partials/head.php"; ?>
<h1>Delete review "<?= $review['title'] ?>" for product "<?= $product['name'] ?>" ?</h1>
<div class="row">
  <div class="product">
    <h2><a href="/product?product_id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h2>
    <p><?= $product['description'] ?></p>
    <p><?= $product['price'] ?>$</p>
  </div>
  <div class="review">
    <h2><?= $review['title'] ?></h2>
    <p>By : <?= $review['name'] ?></p>
    <p><?= $review['rating'] ?> / 5</p>
    <p><?= $review['content'] ?></p>
  </div>
</div>

<p>Do you really want to delete it ?</p>
<form action="" method="post">
  <input type="submit" name="delete" value="Yes">
  <input type="submit" name="delete" value="No">
</form>
