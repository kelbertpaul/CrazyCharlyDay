<?php


namespace crazy\controller;
use crazy\modele\Creneau;
use crazy\vue\VueCreneau;

class ControlleurCreneau
{

    public static function nouveauCreneauForm(){
        $vue = new VueCreneau("nouveau");
        $vue->render();
    }

    public static function ajout(){
        $creneau = new Creneau();
        $vue = null;


        if(($_POST['number3']>= $_POST['number4']) ||
            $_POST['number3']>= 23 || $_POST['number3']<=0 ||
            $_POST['number4']>= 23 || $_POST['number4']<=0){
            $vue = new VueCreneau("erreurDate");
        } else {

            $creneau->jour = $_POST['select1'];
            $creneau->semaine = $_POST['select2'];
            $creneau->heureD = $_POST['number3'];
            $creneau->heureF = $_POST['number4'];
            $creneau->save();
            $vue = new VueCreneau('creneauAjoute');
        }

        $vue->render();

    }

}