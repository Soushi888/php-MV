<?php require "views/partials/head.php" ?>
<main>
  <h1>Product number <?= $product['id'] ?></h1>
  <div class="product">
    <h2><?= $product['name'] ?></h2>
    <p><?= $product['description'] ?></p>
    <p><?= $product['price'] ?>$</p>
  </div>

  <h2>Reviews</h2>
    <a href="review/add?product_id=<?= $product['id'] ?>"><button>Add review</button></a>
  <?php if ($reviews): ?>
    <p>Average rating : <b><?= $average_rating ?> / 5</b></p>

    <div class="reviews">
      <?php foreach ($reviews as $review): ?>
        <div class="review">
          <h3><?= $review['title'] ?></h3>
          <p>By : <?= $review['name'] ?></p>
          <p><?= $review['rating'] ?> / 5</p>
          <p><?= $review['content'] ?></p>
          <div class="buttons">
            <a href="review/edit?review_id=<?= $review['id'] ?>">Edit</a>
            <a href="review/delete?review_id=<?= $review['id'] ?>">Delete</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <p>No reviews yet</p>
  <?php endif; ?>
</main>
<?php require "views/partials/footer.php" ?>

