<?php
namespace App\Controllers;

use Alert;
use App\Core\Form;
use App\Core\Form\FormActualite;
use App\Core\Form\FormCoach;
use App\Core\Image;
use App\Core\SecuriteHTML;
use App\Helpers\Helper;
use App\Helpers\Table;
use App\Models\ActualiteModel;
use App\Models\UserModel;

class AdminController extends Controller{
    

    public function index()
    {
        Helper::adminAcces();

        $actualites = $this->loadTable("actualites")->findAll();
        $data = [];
        $buttons = [];
        foreach ($actualites as $key => $value) {
            $data[$key] = [$value->id_actu, $value->actu_title, $value->actu_description, $value->pictures];
            $buttons[$key]= [
                ["color"=>"secondary","path"=>"", "name"=> "Voir"],
                ["color"=>"warning","path"=>"/admin-show-actualite/{$value->id_actu}", "name"=> "Modifier"], 
                ["color"=>"danger","path"=>"/admin-delete-actualite/{$value->id_actu}", "name"=> "Supprimer"]
            ];
        }
        $tables = new Table;
        
        $tables->beginTable(["class" => "table table-hover mx-auto table-bordered"])
                
                ->thead()
                ->theadElement(['id','Titre','Description','Image','Actions'])
                ->endThead()
                
                ->tbody()
                ->tbodyElement($data,[],$buttons)
                ->closeTrTbody()
                ->endTbody()
                

                ->endTable();
        $updateTable = $tables->createTable();

        $actualite =new Form;
        $message =new Form;
        $actualite->beginForm("/admin-create-actualite", "POST", ["enctype"=>"multipart/form-data"])           
            
                // title
                ->formDiv(["class" => "col-md-11 mx-auto"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("actu_title","Titre de l'actualité",["class" => "small mb-1"])
                        ->addInput("text", "actu_title", ["class" => "form-control", "placeholder"=>"Titre de votre actualité"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("actu_description","Titre de l'actualité",["class" => "small mb-1"])
                        ->addInput("text", "actu_description", ["class" => "form-control", "placeholder"=>"Description de votre actualité"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addTextarea("actu_content", "", ["class" => "form-control", "placeholder"=>"Votre Message"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("formFileDisabled","Titre de l'actualité",["class" => "form-label small mb-1"])
                        ->addInput("file", "image", ["class" => "form-control"])
                    ->endFormDiv()
                ->endFormDiv()
            
            ->addBouton('Ajouter', ["class" => "btn btn-primary"])
        ->endForm();
        
        $actualite = $actualite->create();
        $message->beginForm("/admin-create-actualite", "POST", ["enctype"=>"multipart/form-data"])           
            
                // title
                ->formDiv(["class" => "col-md-11 mx-auto"])
                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("title","Titre de l'actualité",["class" => "small mb-1"])
                        ->addInput("text", "title", ["class" => "form-control", "placeholder"=>"Titre de votre actualité"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addLabelFor("description","Titre de l'actualité",["class" => "small mb-1"])
                        ->addInput("text", "description", ["class" => "form-control", "placeholder"=>"Description de votre actualité"])
                    ->endFormDiv()

                    ->formDiv(["class" => "form-group"])
                        ->addTextarea("msg", "", ["class" => "form-control", "placeholder"=>"Votre Message", "rows"=>"4"])
                    ->endFormDiv()
                ->endFormDiv()
            
            ->addBouton('Ajouter', ["class" => "btn btn-primary"])
        ->endForm();

        $message = $message->create();
        $this->render('Dashboard', 'admin Dashboard','backend/admin/actualite/index', compact('message','actualite', 'updateTable'));
    }


    public function coachs()
    {
        if (!SecuriteHTML::checkedAccess() && !Helper::is_admin()) {
            
            header('Location:/');
        }
        $dataSelection = array();
        $categories = $this->loadTable("sub_categories_teams")->findAll();

        foreach ($categories as $catecory) {
            $dataSelection[$catecory->id_sub_category] = $catecory->category_name;
        }
        $coachs = $this->loadTable("user")->findAll();
         
        $data = $this->btnAndValueToTable('id_user',$coachs,['pictures', 'emails', 'first_names', 'last_names','licences' ],"/equipes-admin-show-coach","/equipes-admin-delete-coach");
        $newTable = Helper::addAnewTable(
            ["class" => "table table-hover mx-auto table-bordered"],
            ['Profil','Nom','Prénom','Email', 'Licence','Actions'],
            $data['first'], $data['sec'], []
        );
        
        $form = new FormCoach;
        $createForm = $form->coachForm($dataSelection, "/equipes-admin-create-coach");
        
        $this->render('Dashboard', 'admin Dashboard','backend/admin/coach/coach', compact('createForm','newTable','coachs'));
    }

    public function showCoach($id)
    {
        $dataSelection = array();
        $categories = $this->loadTable("sub_categories_teams")->findAll();
        foreach ($categories as $catecory) {
            $dataSelection[$catecory->id_sub_category] = $catecory->category_name;
        }

        $coachs = $this->loadTable("user")->findBy(["id_user" => $id])->fetch();
        echo $coachs->genders;
        $data = [$coachs->id_user, $coachs->first_names, $coachs->last_names, $coachs->date, $coachs->genders, $coachs->emails, $coachs->licences];
        $form = new FormCoach;
        $createForm = $form->coachForm($dataSelection,"/equipes-admin-update-coach/$coachs->id_user", $data);
        
        $this->render("modifier ", "page de modification", "backend/admin/coach/update", compact('createForm','coachs'));
    }

    public function updateCoach( $id)
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
            $coachModel
                ->hydrate($dataHydate)
                ->setRoles(2)
                ->update($id, 'id_user');

            $this->loadTable('match_category_coach')
                ->setIdCoach($coachModel->lastIdInsert())
                ->setCategory(SecuriteHTML::securiteHTML($_POST["category"]))
                ->update($id, 'id_coach');
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/equipes-admin-show-coach/'.$id);
        }
    }

    public function createCoach( $id)
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
            $coachModel
                ->hydrate($dataHydate)
                ->setRoles(2)
                ->create();

            $this->loadTable('match_category_coach')
                ->setIdCoach($coachModel->lastIdInsert())
                ->setCategory(SecuriteHTML::securiteHTML($_POST["category"]))
                ->create();
            die();
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/equipes-admin-coach');
        }
        
    }

    public function deleteCoach($id)
    {
        $this->loadTable("user")->delete($id, 'id_user');
        Alert::setAlert("Supression effectuer", "success");
        header('Location:/equipes-admin-coach');
    }

    public function createActualite()
    {

        $actualiteModel = $this->loadTable("actualites");
        $data = [];
        foreach ($_POST as $key => $val) {
            echo $_POST[$key] . "<br>";
            if (!empty($_POST[$key] )) {
                array_push($data, $key);
            }
            
        }

        if (isset($_FILES['image']['size']) && $_FILES['image']['size'] > 20  && Form::validate($_FILES, ['image'])) {
            $getImage = new Image('image');
            $path = $getImage->generateImage("/public/images/actualites");
            
            $actualiteModel->setPictures($path);
        }
        
        if (Form::validate($_POST, $data)) {
            $dataHydate = Helper::createData($data);
            $actualiteModel->hydrate($dataHydate);
            $actualiteModel->create();
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/dashboard');
            
        }
        
    }

    public function deleteActualite($id)
    {
        $clubModel = $this->loadTable("actualites");
        $clubModel->delete($id, 'id_actu');
        Alert::setAlert("Supression effectuer", "success");
        header('Location:/dashboard');
    }

    public function updateActualite( $id)
    {
        $id = $_POST["position"];
        $actualiteModel = $this->loadTable("actualites");
        
        $data = [];
        foreach ($_POST as $key => $val) {
            if (!in_array($key, ['position']) && !empty($_POST[$key])) {
                array_push($data, $key);
            } 
            
        }
        
        if (Form::validate($_POST, $data)) {
            $dataHydate = Helper::createData($data);
            $actualiteModel->hydrate($dataHydate);
            
            $actualiteModel->update($id, 'id_actu');
            // echo "<pre>";
            // var_dump($actualiteModel);
            // die();
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/admin-show-actualite/'.$id);
        }
        
    }


    public function showActualite($id)
    {
        $actualites = $this->loadTable("actualites")->findBy(["id_actu" => $id])->fetch();
        
        $data = [$actualites->id_actu, $actualites->actu_title, $actualites->actu_description, $actualites->actu_content, $actualites->pictures];
        $form = new FormActualite;
        $actualite = $form->actualiteForm("/admin-update-actualite/$actualites->id_actu", $data);


        $this->render("Les joueurs","liste des joueurs", "backend/admin/actualite/actualiteUpdate", compact("actualites","actualite"));
        
    }
    
}