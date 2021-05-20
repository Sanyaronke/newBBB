<?php
namespace App\Controllers;

use Alert;
use App\Core\Form;
use App\Core\Image;
use App\Helpers\Helper;
use App\Models\UserModel;

class SettingController extends Controller{

    

    public function index()
    {
        $profilModel = new UserModel;
        $profils = $profilModel->findBy(["id_user" => $_SESSION["auth"]["id"]])->fetch();

        $this->render("profil", "profile des utilisateur", "backend/profil", compact('profils'));
    }

    public function edit()
    {
        $id = $_POST["position"];
        $coachModel = new UserModel;
        
        $data = [];
        foreach ($_POST as $key => $val) {
            if (!in_array($key, ['position']) && !empty($_POST[$key])) {
                array_push($data, $key);
            } 
            
        }
        if (Form::validate($_POST, $data)) {
            $dataHydate = Helper::createData($data);
            $coachModel->hydrate($dataHydate);
            $coachModel->update($id, 'id_user');
            Alert::setAlert("Modifier avec succès", "success");
            header('Location:/profil');
        }
        
    }
}