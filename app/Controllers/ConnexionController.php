<?php
namespace App\Controllers;

use Alert;
use App\Core\SecuriteHTML;
use App\Helpers\Helper;
use App\Https\HttpRequest;
use App\Models\UserModel;

class ConnexionController extends Controller {

    public function index()
    { 
        if (SecuriteHTML::checkedAccess()) {
            if (Helper::is_admin()) {
                header('Location:/dashboard');
                exit;
            } else {
                header('Location:/');
                exit;
            }
        
        }
        require "../app/Views/backend/login.view.php";
    }



    public function requestTraitement(HttpRequest $request)
    {
        $request->isValideLogin();

        $userModel = new UserModel();
        $user = $userModel->findBy(["emails" => $request->postName('email')])->fetch();
        // var_dump($user);
        // die();
        if (!$user) {
            Alert::setAlert("Le mot de pass et ou l'adresse mail est inncorect", 'danger');
            header('Location:/connexion');
            exit;
        }
        
        $getUsers = $userModel->hydrate($user);

        if (!password_verify($request->postName('password'), $getUsers->getPasswords())) {
            Alert::setAlert("Le mot de pass et ou l'adresse mail est inncorect", 'danger');
            header('Location:/connexion');
            exit;
        }
        
        Helper::setSession("auth", [
            "id" => $getUsers->getIdUser(),
            "role" => $getUsers->getRoles()
        ]);        
        SecuriteHTML::generateCookies();

        if (Helper::is_admin()) {
            header('Location:/dashboard');
            exit;
        } else {
            header('Location:/');
            exit;
        }
    }


    public function logout()
    {
        unset($_SESSION['auth']);
        SecuriteHTML::unsetCookies();
        session_destroy();
        header('Location:/');
    }
}