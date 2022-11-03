<?php

namespace App\Models;


class ReviewsModel
{
    // All the reviews of a product
    private $reviews = [];
    private $connection = null;

 public function __construct($connection)
    {
        $this->connection = $connection;
    }


    // Get all the reviews of a product
    public function getAllReviews($product_id)
    {
        $sql = "SELECT * FROM reviews WHERE product_id = ?";
        $results = $this->connection->prepare($sql);
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
        $results = $this->connection->prepare($sql);

        return $results->execute([$product_id, $title, $name, $content]);
    }
}
