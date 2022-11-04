<?php require "views/partials/head.php"; ?>
<h1>Delete product "<?= $name ?>" ?</h1>
<div class="product">
  <h2><?= $name ?></h2>
  <p><?= $description ?></p>
  <p><?= $price ?>$</p>
</div>
<p>Do you really want to delete it ?</p>
<form action="" method="post">
  <input type="submit" name="delete" value="Yes">
  <input type="submit" name="delete" value="No">
</form>
<?php require "views/partials/footer.php"; ?>
