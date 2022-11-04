<?php require "views/partials/head.php"; ?>
  <div>
    <h2>Create review for product "<?= $product['name'] ?>"</h2>
    <div class="product">
      <h2><a href="/product?product_id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h2>
      <p><?= $product['description'] ?></p>
      <p><?= $product['price'] ?>$</p>
    </div>
    <br>
    <?= isset($error) ? "<p class='error'>" . $error . "</p>" : "" ?>
    <form action="" method="post">
      <label>
        Title : <input type="text" name="title" value="<?= $review_title ?? "" ?>">
      </label>
      <label>
        Name : <input type="text" name="name" value="<?= $name ?? "" ?>">
      </label>
      <label>
        Rating : <input type="number" name="rating" min="0" max="5" step="0.5"
                        value="<?= $rating ?? "" ?>">
      </label>
      <label>
        <textarea name="content" placeholder="Content"><?= $content ?? "" ?></textarea>
      </label>
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
<?php require "views/partials/footer.php"; ?>