<?php require "partials/head.php" ?>
<main>
  <h1>Product number <?= $product['id'] ?></h1>
  <div class="row">
    <div class="product">
      <h2><?= $product['name'] ?></h2>
      <p><?= $product['description'] ?></p>
      <p><?= $product['price'] ?>$</p>
    </div>

    <div>
      <h2>Create review</h2>
      <?php isset($error) ? "<p class='error'>" . $error . "</p>" : "" ?>
      <form action="" class="create-review" method="post">
        <label>
          Title : <input type="text" name="title">
        </label>
        <label>
          Name : <input type="text" name="name">
        </label>
        <label>
          Rating : <input type="number" name="rating" min="0" max="5" step="0.5">
        </label>
        <label>
          <textarea name="content" placeholder="Content"></textarea>
        </label>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>

  <h2>Reviews</h2>
  <div class="reviews">
    <?php foreach ($reviews as $review): ?>
      <div class="review">
        <h3><?= $review['title']; ?></h3>
        <p>By : <?= $review['name']; ?></p>
        <p>Rating : <?= $review['rating']; ?></p>
        <p><?= $review['content']; ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</main>
<?php require "partials/footer.php" ?>

