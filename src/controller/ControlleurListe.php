<?php

namespace crazy\controller;

use crazy\vue\VueGestionRole;
use crazy\modele\Gestion;

class ControlleurListe
{

    public static function liste_gestion_role(){
        $liste = Gestion::get();
        $vue = new VueGestionRole("liste_gestion_role",$liste);
        $vue->render();
    }

}