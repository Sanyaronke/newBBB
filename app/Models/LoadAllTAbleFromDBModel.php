<?php 
namespace App\Models;

/**
 * LoadAllTAbleFromDBModel Load all database table
 * it extends "AllGetterSetter" which contains all the getters and the setters of the tables
 */
class LoadAllTAbleFromDBModel extends AllGetterSetter{
    public $class;

        
    /**
     * __construct
     *
     * @param  PDOObjet $table table of DB
     * @param  mixed $element a attrible of table
     * 
     */
    public function __construct($table, $element) {
        $this->table = $table;
        $this->elements = $element;
    }
}