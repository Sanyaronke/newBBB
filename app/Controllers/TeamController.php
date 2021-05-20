<?php
namespace App\Controllers;

use Alert;
use App\Core\Form;
use App\Core\Form\FormPlayer;
use App\Core\SecuriteHTML;
use App\Helpers\Helper;
use App\Models\SubCategoryModel;
use App\Models\UserModel;

class TeamController extends Controller{
    
    /**
     * index admin player page
     *
     * @return void
     */
    public function index()
    {
        // deconnect if not a super user
        if (!SecuriteHTML::checkedAccess() && !Helper::is_admin()) {    header('Location:/');}
        
        $players= $this->loadTable("all_players")->findAll();
        
        // filling our HTML table
        $data = $this->btnAndValueToTable("id_player",$players,['pictures', 'emails', 'first_names', 'last_names','licences' ],"equipes-admin-show-player","equipes-admin-delete-player");
        $updateTable = Helper::addAnewTable(
            ["class" => "table table-hover mx-auto table-bordered"],
            ['Profil','Nom','Prénom','Email', 'Licence','Actions'],
            $data['first'], $data['sec'], []
        );

        // we will copy the categories into a table which will be used to fill in the select input
        $categories = $this->loadTable("sub_categories_teams")->findAll();
        $dataSelection = array();
        foreach ($categories as $catecory) {
            $dataSelection[$catecory->id_sub_category] = $catecory->category_name;
        }
        
        // filling our HTML form
        $form = new FormPlayer;
        $createForm = $form->teamForm($dataSelection);
        
        $this->render("Les joueurs","liste des joueurs", "backend/admin/team/team", compact("createForm","updateTable","players"));
        
    }
    
    /**
     * createPlayer add a new player
     *
     * @return void
     */
    public function createPlayer()
    {
        
        $playerModel = $this->loadTable('all_players');
        
        $data = [];
        foreach ($_POST as $key => $val) {
            if (!in_array($key, ['position']) && !empty($_POST[$key])) {
                array_push($data, $key);
            } 
            
        }
        // echo "<pre>";
        // var_dump($_POST);
        // die();
        if (Form::validate($_POST, $data)) {
            $dataHydate = Helper::createData($data);
            $playerModel->hydrate($dataHydate);
            $playerModel->setRole(3);
            $playerModel->create();
            // echo "<pre>";
            // var_dump($playerModel);
            // die();
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/equipes-admin-player');
        }
        
    }
    
    /**
     * showPlayer show one player to update
     *
     * @param  int $id
     * @return void
     */
    public function showPlayer($id)
    {
        $catecoryModel = $this->loadTable("sub_categories_teams");
        $categories = $catecoryModel->findAll();

        foreach ($categories as $catecory)
            $dataSelection[$catecory->id_sub_category] = $catecory->category_name;

        $playerModel = $this->loadTable("all_players");
        $players = $playerModel->findBy(["id_player" => $id])->fetch();
        
        $data = [$players->id_player, $players->first_names, $players->last_names, $players->date, $players->genders, $players->emails, $players->licences];
        $form = new FormPlayer;
        $createForm = $form->teamForm($dataSelection, $data);

        $this->render("Les joueurs","liste des joueurs", "backend/admin/team/teamUpdate", compact("players","createForm"));
        
    }

        
    /**
     * updatePlayer update a new player
     *
     * @param  int $id
     * @return void
     */
    public function updatePlayer($id)
    {
        // echo "<pre>";
        // var_dump($_POST);
        // die();
        $id = $_POST["position"];
        $playerModel = $this->loadTable("all_players");
        
        $data = [];
        foreach ($_POST as $key => $val) {
            if (!in_array($key, ['position']) && !empty($_POST[$key])) {
                array_push($data, $key);
            } 
            
        }
        
        if (Form::validate($_POST, $data)) {
            $dataHydate = Helper::createData($data);
            $playerModel->hydrate($dataHydate);
            $playerModel->update($id, 'id_player');
            Alert::setAlert("éfectué avec succès", "success");
            header('Location:/equipes-admin-show-player/'. $id);
        }
        
    }
    
    /**
     * deletePlayer delete a new player
     *
     * @param  int $id
     * @return void
     */
    public function deletePlayer($id)
    {
        $playerModel = $this->loadTable("all_players");
        $playerModel->delete($id, 'id_player');
        Alert::setAlert("Supression effectuer", "success");
        header('Location:/equipes-admin-player');
    }


    
    /**
     * showTeamOne this method displays a page containing information about the club's team
     *
     * @return void
     */
    public function showTeamOne()
    { 
        $teamOne = $this->loadTable("all_players")->findBy(['role' =>'1']);
        $coachs = $this->loadTable("user")->findBy(['roles' =>'2'])->fetchAll();
    
        return $this->render('Senior 1','page de l\'equipe premiere', 'frontend/teams/pnm',compact('coachs','teamOne'), 'default');
    } 
    
    /**
     * showOtherTeam this method displays a page containing information about the club's team
     * @param int $id team category
     * @return void
     */
    public function showOtherTeam($id)
    { 
        $equipesModel = $this->loadTable('all_players JOIN sub_categories_teams ON sub_categories_teams.id_sub_category = all_players.category');
        $equipes = $equipesModel->findBy(['sub_categories_teams.general_category' => $id])->fetchAll();
        if (!empty($equipes)) {
            $coachsModel = $this->loadTable('user JOIN match_category_coach ON match_category_coach.id_coach = id_user JOIN sub_categories_teams ON sub_categories_teams.id_sub_category = match_category_coach.category');
            $coachs = $coachsModel->findBy(['sub_categories_teams.general_category' => $id])->fetchAll();
            return $this->render('Equipes du club','les equipes','frontend/teams/otherTeams', compact('coachs','equipes'),'default');
        }
        // maintenance template
        return $this->render('Equipes du club','les equipes','maintenance',[], 'default');
    }
    
    /**
     * calandarPnm this page displays the match standings of the first team
     *
     * @return void
     */
    public function calandarPnm()
    {   
        return $this->render('Calendrier', 'Calendrier des pnm', 'frontend/teams/calandarPnm', [], 'default');
    }
    
}