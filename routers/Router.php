<?php

namespace Route;

/**
 *  la class du routeur
 */
class Router {
    public $url;
    public $routes = [];

    public function __construct($url) {
        $this->url = trim($url, '/');
    }

    
    public function get(string $path, string $action)
    {
        $routes = new Route($path, $action);
        $this->routes['GET'][] = $routes;
    }


    public function run()
    {
        
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                $route->execute();
            }
        }
        return header('HTTP/1.0 404 not found');
    }
}