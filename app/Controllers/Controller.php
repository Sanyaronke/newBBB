<?php
namespace App\Controllers;

use Alert;
use App\Models\CategoryModel;
use App\Models\LoadAllTAbleFromDBModel;

class Controller {
    
    protected $data = [];
    protected $buttons = [];

    
    /**
     * loadTable
     *
     * @param  string $table
     * @param  string $param
     * @return PDOStatement
     */
    protected function loadTable(string $table, string $param = " * ") {
        
        return new LoadAllTAbleFromDBModel($table, $param);
    }
    
    /**
     * render
     *
     * @param  string $title title of our pages
     * @param  string $description description of our pages
     * @param  string $path path of our pages
     * @param  array $data data DB
     * @param  string $layout template of our pages
     * @return void
     */
    public function render(string $title, string $description, string $path, array $data = [], string $layout = "adminTemplate")
    {
        $sub_categories = $this->loadTable("team_category")->findAll();
        $title = $title;
        $description = $description;
        extract($data);

        ob_start();
        require "../app/Views/{$path}.view.php";

        $contents = ob_get_clean();
        require "../app/Views/layout/{$layout}.view.php";

    }

    
    /**
     * btnAndValueToTable create an array containing two arrays
     * create an array that will be used to fill the elements of our html array
     * 
     * @param  int $id id of an element of the database
     * @param  array $object table containing the various data from our databases
     * @param  array $data contains the element fields of our database tables
     * @param  string $pathShow link that displays the information to modify
     * @param  string $pathDelete link that displays the information to delete
     * @return array
     */
    public function btnAndValueToTable($id,$object, $data, $pathShow, $pathDelete)
    {
        $dataObject = [];
        $buttonsOfTable = [];
        $elementOfBD = array();
        foreach ($object as $key => $value) {
            for ($i = 0; $i < count($data); $i++) { 
                $li = $data[$i];
                array_push($elementOfBD , $value->$li );
            }
            $dataObject[$key] = $elementOfBD;
            array_splice($elementOfBD, 0);
            $buttonsOfTable[$key]= [
                ["color"=>"secondary","path"=>"", "name"=> "Voir"],
                ["color"=>"warning","path"=>$pathShow.'/'.$value->$id, "name"=> "Modifier"], 
                ["color"=>"danger","path"=>$pathDelete.'/'.$value->$id, "name"=> "Supprimer"]
            ];
        }
        return array(
            'first' => $dataObject,
            'sec' => $buttonsOfTable
        
        );
    }


        
        
    /**
     * delementObjet delete an element from the database
     *
     * @param  string $table database Table
     * @param  array $alertMessage contains the alert message and the specific color
     * @param  array $idElement contains the id of the element to modify
     * @param  string $location the redirection route
     * @return void
     */
    public function delementObjet(string $table, array $alertMessage, array $idElement, string $location )
    {
        $this->loadTable($table)->delete($idElement[0], $idElement[1]);
        
        Alert::setAlert($alertMessage[0], $alertMessage[1]);
        header('Location:'. $location);
    }


    
}