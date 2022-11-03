<?php

class Router
{
    protected array $routes = [];

    static public function load($file)
    {
        $router = new Router;
        require $file;
        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    /**
     * @throws Exception if route is not defined
     */
    public function direct($uri)
    {
        try {
            if (array_key_exists($uri, $this->routes)) {
                return $this->routes[$uri];
            }

            throw new Exception('No route defined for this URI.');
        } catch (Exception $e) {
            return $this->routes["404"];
        }
    }
}