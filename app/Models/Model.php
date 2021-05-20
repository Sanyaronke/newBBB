<?php
namespace App\Models;

use App\Core\Db;

class Model extends Db{
    
    private $db;
    protected $table;
    protected $elements;

    /**
     * select all the records of a table
     *
     * @return array 
     */
    public function lastIdInsert()
    {
        return Db::getIsntance()->lastInsertId();
    }
    public function findAll()
    {
        $query = $this->request("SELECT {$this->elements} FROM {$this->table}");
        return $query->fetchAll();
    }

    public function findBy(array $attributs)
    {
        $cases = [];
        $values = [];

        //var_dump($attributs);

        foreach ($attributs as $attribut => $value) {
            $cases[] = "$attribut = ?";
            $values[] = "$value";
        }
        $cases_to_list = implode(' AND ', $cases);
        
        return $this->request("SELECT {$this->elements} FROM {$this->table} WHERE {$cases_to_list} ", $values);

    }

    /**
     * update element on the DB
     *
     * @param [type] $id
     * @param string $idTable
     * @return PDOExeption
     */
    public function update($id, string $idTable)
    {
        $champs = [];
        $valeurs = [];

        
        foreach ($this as $champ => $valeur) {
            if ($valeur !== null && $champ != 'db' && $champ != 'table' && $champ != 'elements') {
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
            }
        }
        $valeurs[] = $id;

        // On transforme le tableau "champs" en une chaine de caractères
        $liste_champs = implode(', ', $champs);
        return $this->request("UPDATE {$this->table}  SET  {$liste_champs}  WHERE {$idTable} = ?", $valeurs);
    }

    /**
     * Add a new object on the database
     * @param Model $model creation object
     * @return bool
     */
    public function create()
    {
        $champs = [];
        $inter = [];
        $valeurs = [];
        
        // find the object array 
        foreach($this as $champ => $valeur){
            
            // (title, description, actif) VALUES (?, ?, ?)
            if($valeur !== null && $champ != 'db' && $champ != 'table' && $champ != 'elements'){
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        return $this->request('INSERT INTO '.$this->table.' ('. $liste_champs.')VALUES('.$liste_inter.')', $valeurs);
        //var_dump($ok);
    }

    /**
     * destroy element on the DB
     *
     * @param integer $id
     * @param string $idTable
     * @return bool
     */
    public function delete(int $id, string $idTable){
        return $this->request("DELETE FROM {$this->table} WHERE {$idTable} = ?", [$id]);
    }

    /**
     * Preparation of sql request
     *
     * @param string $sql
     * @param array $attributs
     * @return PDOstatement|false
     */
    public function request(string $sql, array $attributs = null)
    {
        $this->db = Db::getIsntance();

        if ($this->db !== null) {
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
        } else {
            $query =  $this->db->query($sql);
        }
        return $query;
    }



    public function hydrate($attributs)
    {
        foreach ($attributs as $key => $value) {
            $key = explode("_", $key);
            $dropBar = "set";
            for ($i=0; $i < count($key) ; $i++) { 
                $dropBar .= ucfirst($key[$i]);
            }
            $setter = $dropBar;

            if(method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
        return $this;
    }
}