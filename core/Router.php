<?php

class Router
{
    // Array of routes
    protected array $routes = [];

    // Load the router with the specified routes file
    static public function load($file)
    {
        $router = new Router;
        require $file;
        return $router;
    }

    // Define the routes
    public function define($routes)
    {
        $this->routes = $routes;
    }

    /**
     * Get the URI from the request and compare it to the routes
     * @throws Exception if route is not defined
     */
    public function direct($uri)
    {
        try { // Try to find the route
            if (array_key_exists($uri, $this->routes)) {
                return $this->routes[$uri];
            }

            throw new Exception('No route defined for this URI.');
        } catch (Exception $e) { // If the route is not defined, return 404 route
            return $this->routes["404"];
        }
    }
}