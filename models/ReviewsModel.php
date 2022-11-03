<?php

namespace App\Models;

use Dbh;

class ReviewsModel extends Dbh
{
    // All the reviews of a product
    private $reviews = [];


    // Get all the reviews of a product
    public function getAllReviews($product_id)
    {
        $sql = "SELECT * FROM reviews WHERE product_id = ?";
        $results = $this->connect()->prepare($sql);
        $results->execute([$product_id]);
        $reviews = $results->fetchAll();

        foreach ($reviews as $review) {
            $this->reviews[] = $review; // Add the review to the class property
        }

        return $this->reviews;
    }

    // Create a review
    public function createReview($product_id, $title, $name, $content)
    {
        $sql = "INSERT INTO reviews (product_id, title, name, content) VALUES (?, ?,?, ?)";
        $results = $this->connect()->prepare($sql);

        return $results->execute([$product_id, $title, $name, $content]);
    }
}
