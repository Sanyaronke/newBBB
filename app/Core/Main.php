<?php

namespace App\Core;

use Route\Router;

class Main {

    public function start()
    {
        $route = new Router($_GET["url"]);
        $route->get('/', 'App\Controllers\HomeController@index');
        $route->get('pot/post/:id', 'App\Controllers\HomeController@show');



        // verification des match 
        $route->run();
    }
}