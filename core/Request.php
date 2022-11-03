<?php

// Helper functions
class Request
{
    // Get the requested URI
    public static function uri()
    {
        return trim(
            // Remove the query string from the URI
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }
}