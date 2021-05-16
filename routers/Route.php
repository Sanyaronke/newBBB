<?php

namespace Route;

class Route
{
    // pour stocker nos route
    private static $request;


    // public $matches;
    
    public static function get(string $paht, string $action)
    {
        // on stock l'intance qui va permetre de faire les match dans routes
        $routes = new Request($paht, $action);
        // stocage de route dans request
        self::$request['GET'][] = $routes;
        return $routes;
    }

    public static function post(string $paht, string $action)
    {
        // on stock l'intance qui va permetre de faire les match dans routes
        $routes = new Request($paht, $action);
        // stocage de route dans request
        self::$request['POST'][] = $routes;
        return $routes;
    }

    public static function run()
    {
        // on recupere la methode auto passer en parametree 
        // on se retrouve avec l'instance de la class request dans route
        // echo '<pre>';
        // var_dump(self::$request['GET']);
        foreach (self::$request[$_SERVER['REQUEST_METHOD']] as $route) 
        {
            //on match nos route
            if ( $route->match(trim($_GET['url'], '/')) ) 
            {
                // on execute tous les routes
                $route->execute();
                // on quite des qu'on trouve une route correspondante
                die();
            }
        }
        header('HTTP/1.0 404 Not found');
    }
    public static function url(string $name, $parametres = [])
    {
        foreach (self::$request as $key => $value) {
            foreach (self::$request[$key] as $routes) {
                if (array_key_exists($name, $routes->name())) 
                {
                    $route = $routes->name();
                    $path = implode("",$route[$name]);
                    if (!empty($parametres)) 
                    {
                        foreach ($parametres as $key => $value) 
                        {
                            $url = str_replace("{{$key}}", $value, $path);
                            return '/'.$url;
                        }
                    } else {
                        return '/'.$path;
                    }
                }
            }
        }
    }
}
