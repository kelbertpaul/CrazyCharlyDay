<?php
namespace crazy\controller;

use crazy\vue\VueEnsembleCompte;
use crazy\modele\User;

class ControllerAuthentification {

    public static function connecterCompteSansAuth(){
        $user = User::get();
        $vueCompte = new VueEnsembleCompte($user);
        $vueCompte->render();
    }

    public static function connecterComptePrecis($id){
        $user = User::where("id","=",$id)->first();
        $_SESSION['user_connected'] = array(
            'id' => $user->id,
            'nom' => $user->nom,
            'role_id' => 1,
        );
        $vueUtilisateur = new VueCompte();
        $vueUtilisateur->render();
    }
}