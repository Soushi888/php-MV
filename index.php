<?php
require "core/bootstrap.php"; // Load the bootstrap file

// Load the router
require Router::load('routes.php')
    ->direct(Request::uri()); // Get the requested URI and direct to the route