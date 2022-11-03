<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title><?= $product['name'] ?></title>
</head>
<body>
  <nav><a href="/products">Products</a></nav>
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
        <form action="" class="create-review" method="post">
          <label>
            Title : <input type="text" name="title">
          </label>
          <label>
         Name : <input type="text" name="name">
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
          <p><?= $review['content']; ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
</body>
</html>

