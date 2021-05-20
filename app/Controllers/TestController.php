<?php
namespace App\Controllers;

use App\Models\LoadAllTAbleFromDBModel;

class TestController extends Controller {
    public function index()
    {
        echo "<pre>";
        $idObject = $this->loadTable("all_players", "first_names");
        $test = $idObject->findBy(["id_player" => 1])->fetch();

        var_dump($test);
        
    }
}