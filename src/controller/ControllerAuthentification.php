<?php

namespace crazy\controller;

use crazy\vue\VueConnexion;
use crazy\vue\VueConnexion2;
use crazy\vue\VueEnsembleCompte;
use crazy\modele\User;

class ControllerAuthentification
{

    public static function connecterCompteSansAuth()
    {
        $user = User::get();
        $vueCompte = new VueEnsembleCompte($user);
        $vueCompte->render();
    }

    public static function connecterComptePrecis($id)
    {
        $user = User::where("id", "=", $id)->first();
        $_SESSION['user_connected'] = array(
            'id' => $user->id,
            'nom' => $user->nom,
            'role_id' => 1,
        );
        $vueUtilisateur = new VueConnexion("HORS-LIGNE");
        $vueUtilisateur->render();
    }

    public static function connecterCompteSecure()
    {
        $res = "";
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $user = User::where("id", "=", $_POST['username']);
            if ($user->password == $_POST['password']) {
                $vue = new VueConnexion2($user);
                $vue->render("TRUE");
            }
        } else {
            echo "<div class=\"alert alert-danger\" role=\"alert\">
  A simple danger alert—check it out!
</div>";
        }
    }

    public static function accederConnexion(){
        $vue = new VueConnexion2();
        $vue->render("CREATE");
    }
}