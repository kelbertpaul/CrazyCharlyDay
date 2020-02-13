<?php


namespace crazy\controller;
use crazy\vue\VueCreneau;

class ControlleurCreneau
{

    public static function nouveauCreneauForm(){
        $vue = new VueCreneau("nouveau");
        $vue->render();
    }

}