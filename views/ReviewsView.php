<?php

namespace App\Views;

class ReviewsView
{
  // Show all the reviews given in the parameter
  static function showReviews($reviews)
  {
    if (isset($reviews)) {
      foreach ($reviews as $review) { ?>
        <div class="review">
          <h3><?= $review['title']; // `<?=` is similar to `<?php echo`  ?></h3>
          <p>By : <?= $review['name']; ?></p>
          <p><?= $review['content']; ?></p>
        </div>
      <?php }
    }
  }

  // Show the form to create a review
  static function createReviewForm()
  { ?>
    <form action="" class="create-review" method="post">
      <input type="text" name="title" placeholder="Title">
      <input type="text" name="name" placeholder="Name">
      <textarea name="content" placeholder="Content"></textarea>
      <input type="submit" name="submit" value="Submit">
    </form>
  <?php }

}