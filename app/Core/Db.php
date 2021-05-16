<?php 
namespace App\Core;

use PDO;

/**
 * cette class nous permet de nous connecter a notre base de donnnées
 */

class Db extends PDO {

    private static $instance;
    private const DBHOST ="localhost",
                  DBNAME = "basketApp",
                  DBUSER = "root",
                  DBPASS = "anyaronkE-123";

    private function __construct() {
        
        $dsn = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;


        try {
            parent:: __construct($dsn, self::DBUSER, self::DBPASS);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // tableau associative
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     *  retrieve the instance of database
     *
     * @return self
     */
    public static function getIsntance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

}