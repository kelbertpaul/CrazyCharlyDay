<?php

namespace crazy\controller;
use crazy\vue\VueConnexion;
class ControlleurConnexion {

    public static function formulaireCo() {
        $vue = new VueConnexion("CONNEXION");
        $vue->render();
    }
}