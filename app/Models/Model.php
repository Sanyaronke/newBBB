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
    public function findAll()
    {
        $query = $this->request("SELECT {$this->elements} FROM {$this->table}");
        return $query->fetchAll();
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
}