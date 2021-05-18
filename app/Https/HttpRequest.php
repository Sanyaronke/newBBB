<?php

namespace App\Https;

use Alert;

class HttpRequest
{
    public function postName($name= null)
    {
        if ($name == null) {
            return $_POST;
        }
        return $_POST[$name];
    }

    public function allPost()
    {
        return $_POST;
    }

    /**
     * methode to valide a login form
     *
     * @return boolean
     */
    public function isValideLogin()
    {
        if(empty($this->postName()) || $this->postName('password') === "" || $this->postName('email')=== "") {
            Alert::setAlert("Veillez remplir tous les champs", 'warning');
        }
    }
    /**
     * 
     *
     * @return boolean
     */
    public function isValidPassword()
    {
        //  check if we have a valid pass
        if (empty($this->postName('password'))) {
            Alert::setAlert("Veillez remplir tous les champs", 'warning');
        } 
        if(strlen($this->postName('password') ) < 7) {
            Alert::setAlert("Le mot de passe doit contenir au minimum 8 caracteres", 'warning');
        }

    }
}
