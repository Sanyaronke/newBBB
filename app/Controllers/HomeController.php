<?php

namespace App\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        $actualites = $this->loadTable("actualites")->findAll();
        $this->render('Acceuil', 'Page Acceuil', 'frontend/home/home',compact("actualites"), 'default');
    }

    public function contact()
    {
        $this->render('Contact', 'Page de contact', 'frontend/home/contact');
    }
    // public function reciveMsgFromContact()
    // {
    //     //  we copy the POST NAME we need
    //     if (Form::validate($_POST, ['name', 'email', 'message', 'number'])) {
    //         if (!ctype_digit($_POST['number'])) {
    //             Alert::setAlertSession('warning', "Le numero de telephone est inncorect");
    //             header('Location:/contact');
    //         }
    //         if ((int)$_POST["captcha"] === 8) {

    //             $nom = Securite::securiteHTML($_POST["nom"]);
    //             $objet = Securite::securiteHTML($_POST["objet"]);
    //             $numero = Securite::securiteHTML($_POST["numero"]);
    //             $email = Securite::securiteHTML($_POST["email"]);
    //             $msg = Securite::securiteHTML($_POST["message"]);

    //             mail('dwayne-12@hotmail.fr', "$objet - $nom - $numero ", "email : $email Message : $msg");
    //             Alert::setAlertSession('success', "Message envoyé");
    //             header('Location:/contact');
    //         }
    //         Alert::setAlertSession('danger', "Reponse inncorect");
    //         header('Location:/contact');
    //     }
    //     Alert::setAlertSession('danger', "les Champs ne sont pas correctement remplie");
    //     header('Location:/contact');
    // }
}
