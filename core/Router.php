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
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        } else {
            return $this->routes["404"];
        }
    }
}