<?php
namespace App\Core;
const COOKIE_NAME = 'allAdmin';
class SecuriteHTML {
    
    //private const COOKIE_NAME = 'allAdmin';

    /**
     * securise les entrées de not input ou meme des http requetes
     *
     * @param string $name
     * @return string
     */
    public static function securiteHTML(string $name)
    {
        return htmlentities($name);
    }

    /**
     * generer un cookie unique pour la 
     *
     * @return void
     */
    // public static function generateCookies()
    // {
    //     $ticket = session_id().microtime().rand(0,9999999);
    //     $ticket = hash("sha512", $ticket);
    //     $_SESSION[COOKIE_NAME] = $ticket;
    //     setcookie(COOKIE_NAME, $ticket, time() + (60 * 60), "/");
        
    // }

    /**
     * verifie si un cookie existe au prealable
     * on genere un cookie a chaque rechargement des pages d'admin
     * @return bool
     */

    public static function test()
    {
        if($_COOKIE[COOKIE_NAME] === $_SESSION[COOKIE_NAME])
        {
            echo "c'est bon";
        } else {
            echo "non";
        }
    }
    public static function generateCookies(){
        $ticket = session_id().microtime().rand(0,9999999);
        $theTicket = hash("sha512", $ticket);
        setcookie(COOKIE_NAME, $theTicket, time() + (60 * 20));
        $_SESSION[COOKIE_NAME] = $theTicket;
    }

    public static function checkedCookie(){
        if(isset($_SESSION[COOKIE_NAME]) && $_COOKIE[COOKIE_NAME] === $_SESSION[COOKIE_NAME]){
            SecuriteHTML::generateCookies();
            return true;
        } else {
            session_destroy();
            header('Location:/connexion');
        }
    }
    // public static function checkedCookie()
    // {
    //     if( isset($_SESSION[COOKIE_NAME]) && $_COOKIE[COOKIE_NAME] === $_SESSION[COOKIE_NAME]){
    //         self::generateCookies();
    //         return true;
    //     } else {
    //         session_destroy();
    //         header('Location:/connexion');
    //     }
    // }

    /**
     * verification si un utilisateur est bien connecter
     *
     * @return bool
     */
    public static function checkedSeesion(){
        return (isset($_SESSION['auth']) && !empty($_SESSION['auth']));
    }

    /**
     * Verification si un utilisateur est bien connecter et a un cookie assigné
     *
     * @return bool
     */
    public static function checkedAccess()
    {
        return (self::checkedSeesion() && self::checkedCookie());
    }

    /**
     * supression des cookie
     *
     * @return void
    */
    public static function unsetCookies()
    {
        setcookie(COOKIE_NAME, $_SESSION[COOKIE_NAME], time() - 3600);
        session_destroy();
    }
}