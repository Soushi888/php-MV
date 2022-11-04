<?php

namespace App\Models;

use PDO, Exception;

class ReviewsModel
{
    // Database connection
    private $connection = null;
    // All the reviews of a product
    private $reviews = [];

    public function __construct($connection)
    {
        $this->connection = $connection; // Set the database connection
    }


    // Get all the reviews of a product
    public function getAllReviews($product_id)
    {
        $sql = "SELECT * FROM reviews WHERE product_id = ?";
        $results = $this->connection->prepare($sql);
        $results->execute([$product_id]);
        $reviews = $results->fetchAll(PDO::FETCH_ASSOC);

        foreach ($reviews as $review) {
            $this->reviews[] = $review; // Add the review to the class property
        }

        return $this->reviews;
    }

    // Create a review
    public function createReview($product_id, $title, $name, $rating, $content)
    {
        $sql = "INSERT INTO reviews (product_id, title, name, rating, content) VALUES (?, ?, ?, ?, ?)";
        $results = $this->connection->prepare($sql);

        $this->validateReview($title, $name, $rating, $content);

        return $results->execute([$product_id, $title, $name, $rating, $content]);
    }

    // Validate the review
    private function validateReview($title, $name, $rating, $content)
    {
        $rating = round((int)$rating * 2) / 2;

        if ($rating > 5 || $rating < 0) {
            throw new Exception("Rating must be between 0 and 5");
        }

        if (!$title || !$name || !$rating || !$content) {
            throw new Exception("All fields are required");
        }
    }
}
