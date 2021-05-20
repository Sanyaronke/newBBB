<?php

namespace Route;
use App\Https\HttpRequest;
/**
 *  la class du routeur
 */
class Request
{

    private $path;
    private $action;
    private $params = [];
    private $request;
    private $routeName;
    /**
     * Class constructor.
     */
    public function __construct(string $path, string $action)
    {
        $this->request = new HttpRequest();
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function name(string $name = null)
    {
        $this->routeName[$name][] = $this->path;
        return $this->routeName;
    }

    public function match($url)
    {
        $path = preg_replace('#({[\w]+})#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#"; // on remplace toute la chaine 

        if (preg_match($pathToMatch,$url, $results)) 
        {
            array_shift($results); // on ecrase le chemin courant pour garder les parametres
            $this->params = $results;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        {
            $this->getRequest();
        } else {
            $this->postRequest();
        }
    }

    public function getRequest()
    {
        if (is_string($this->action))
        {
            $action = explode('@', $this->action);
            $controller = $action[0];
            $controller = new $controller();
            $method = $action[1];
            return isset($this->params) ? $controller->$method(implode($this->params)) : $controller->$method();
        
        } else {
            call_user_func_array($this->action, $this->params);
        }
    }

    public function postRequest()
    {
        if (is_string($this->action))
        {
            $action = explode('@', $this->action);
            $controller = $action[0];
            $controller = new $controller();
            $method = $action[1];
            return isset($this->params) ? $controller->$method($this->request,implode($this->params)) : $controller->$method($this->request);
        
        } else {
            call_user_func_array($this->action, $this->params);
        }
    }
}