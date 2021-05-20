<?php

namespace App\Controllers;

use Alert;
use App\Core\Form\Form;
use App\Core\Form\FormPartner;
use App\Core\Image;
use App\Core\SecuriteHTML;
use App\Helpers\Helper;

class ClubController extends Controller{


    public function index()
    {
        if (!SecuriteHTML::checkedAccess() && !Helper::is_admin()) { header('Location:/');}



        $partners    = $this->loadTable("partners")->findAll();

        $data = $this->btnAndValueToTable('id_partner',$partners,['id_partner', 'name_partner', 'pictures', 'slug_partner'],"/club-admin-show-partner","/club-admin-delete-partner");
        $updateTable = Helper::addAnewTable(
            ["class" => "table table-hover mx-auto table-bordered"],
            ['ID','Tag','Image','Site Web','Actions'],
            $data['first'], $data['sec'], []
        );
        $form = new FormPartner;
        $createForm = $form->partnerForm("/club-admin-create-partner");


        $this->render("Les joueurs","liste des joueurs", "backend/admin/partner/partner", compact("createForm","updateTable","createForm"));

    }


    public function createPartner()
    {


        $partnerModel = $this->loadTable("partners");
        $data = [];
        foreach ($_POST as $key => $val) {
            if($key !== "position")
            {
                array_push($data, $key);
            }
        }

        if (isset($_FILES['image']['size']) && $_FILES['image']['size'] > 20  && Form::validate($_FILES, ['image'])) {
            $getImage = new Image('image');
            $path = $getImage->generateImage("/public/images/partners");

            $partnerModel->setPictures($path);
        }
        if (Form::validate($_POST, $data)) {
            $dataHydate = Helper::createData($data);
            $partnerModel->hydrate($dataHydate);
            $partnerModel->create();
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/club-admin-partner');

        }

    }

    public function deletePartner($id)
    {
        $clubModel = $this->loadTable("partners");
        $clubModel->delete($id, 'id_partner');
        Alert::setAlert("Supression effectuer", "success");
        header('Location:/club-admin-partner');
    }

    public function updatePartner( $id)
    {
        
        $id = $_POST["position"];
        $partnerModel = $this->loadTable("partners");

        $data = [];
        foreach ($_POST as $key => $val) {
            if (!in_array($key, ['position']) && !empty($_POST[$key])) {
                array_push($data, $key);
            }

        }
        
        if (Form::validate($_POST, $data)) {
            $dataHydate = Helper::createData($data);
            $partnerModel->hydrate($dataHydate);

            $partnerModel->update($id, 'id_partner');
            // echo "<pre>";
            // var_dump($partnerModel);
            // die();
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/club-admin-show-partner/'.$id);
        }

    }


    public function showPartner($id)
    {
        $partners = $this->loadTable("partners")->findBy(["id_partner" => $id])->fetch();

        $data = [$partners->id_partner, $partners->name_partner, $partners->slug_partner, $partners->pictures];
        $form = new Formpartner;
        $partnerForm = $form->partnerForm("/club-admin-update-partner/$partners->id_partner", $data);


        $this->render("Les joueurs","liste des joueurs", "backend/admin/partner/partnerUpdate", compact("partners","partnerForm"));

    }




    public function aboutPage()
    {
        return $this->render("A propos", "Page d'apropos", "frontend/club/about", [], 'default');
    }

    public function upgradingPlayer()
    {
        $this->render('Surclassement','Surclassement','frontend/club/upgrading', [], 'default');
    }

    public function e_marqueFormation()
    {
        $this->render("formation e_marque", "formation e_marque", "frontend/club/e_marque", [], 'default');
    }

    public function allReferee()
    {
        $this->render("Les arbitres", "Les arbitres", "frontend/club/referee", [], 'default');
    }

    public function clubParty()
    {
        return $this->render('Equipes du club','les equipes','maintenance',[], 'default');
    }

    
}