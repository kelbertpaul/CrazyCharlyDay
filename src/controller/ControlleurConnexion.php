<?php

namespace CrazyCharlyDay\controller;
use CrazyCharlyDay\vue\VueConnexion;
class ControlleurConnexion {

    public static function formulaireCo() {
        $vue = new VueConnexion("CONNEXION");
        $vue->render();
    }
}