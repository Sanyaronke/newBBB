<?php
namespace App\Helpers;

use App\Core\SecuriteHTML;
use Route\Route;

class Helper {

        
    /**
     * routename
     *
     * @param  string $name the route name
     * @param  array|null $params 
     * @return route
     */
    public static function routename($name, $params = []){
        $path = Route::url($name, $params);
        echo $path;
    }

    /**
     * creation d'une session
     *
     * @param string $name session name
     * @param array $option param of session name
     * @return SESSION
     */
    public static function setSession(string $name, array $option)
    {
        foreach ($option as $key => $value) { 
            $_SESSION[$name][$key] = $value;
        }
    }
    
    /**
     * is_admin test if user is admin
     *
     * @return bool
     */
    public static function is_admin()
    {
        if (isset($_SESSION['auth']) && $_SESSION['auth']['role'] === '1') {
            return true;
        }
        return false;
    }

    
    /**
     * createData transforms the elements of a table into a settlers methods
     *
     * @param  array $data
     * @return array
     */
    public static function createData($data)
    {
        $hydrate = [];
        for ($i = 0; $i < count($data); $i++) {
            $element = substr(strstr($data[$i],"-"), 1);
            if ($data[$i] == 'actu_content') {
                $hydrate[$data[$i]] = $_POST[$data[$i]];
            } else {
                $hydrate[$data[$i]] = SecuriteHTML::securiteHTML($_POST[$data[$i]]);
            }
        }
        return $hydrate;
    }

        
    /**
     * addAnewTable
     *
     * @param  array $tableOption can be html class, ids
     * @param  array $tHead header element of the html table
     * @param  array $tBody tBody element of the html table
     * @param  array|null $btn buttons to add in the html table
     * @param  array|null $option can be html class, ids
     * @return string
     */
    public static function addAnewTable($tableOption,$tHead, $tBody, $btn = [], array $option = [])
    {
        $tables = new Table;
        $tables->beginTable($tableOption)
                
                ->thead()
                ->theadElement($tHead)
                ->endThead()
                
                ->tbody()
                ->tbodyElement($tBody,$option,$btn)
                ->closeTrTbody()
                ->endTbody()
                

                ->endTable();
        return $tables->createTable();
    }

    
    /**
     * adminAcces test if user ins connect
     *
     * @return bool
     */
    public static function adminAcces()
    {
        if (!SecuriteHTML::checkedAccess() && !Helper::is_admin()) 
        { header('Location:/'); }
    }
}