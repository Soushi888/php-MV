<?php require "views/partials/head.php"; ?>
<h1>Add product</h1>
<?= isset($error) ? "<p class='error'>" . $error . "</p>" : "" ?>
<form action="" class="create-product" method="post">
  <label>
    Name : <input type="text" name="name" value="<?= $name ?? "" ?>">
  </label>
  <label>
    Description : <input type="text" name="description" value="<?= $description ?? "" ?>">
  </label>
  <label>
    Price : <input type="number" name="price" value="<?= $price ?? "" ?>">
  </label>
  <input type="submit" name="submit" value="Submit">
</form>
<?php require "views/partials/footer.php"; ?>
