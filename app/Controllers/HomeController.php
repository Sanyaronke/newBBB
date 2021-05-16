<?php
namespace App\Controllers;

class HomeController {


    public function index()
    {
        echo "ici la page d'acceuil";
    }


    public function show(int $id)
    {
        echo "ici le post ". $id;
    }
}