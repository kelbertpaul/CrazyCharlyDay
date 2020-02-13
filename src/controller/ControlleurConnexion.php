<?php

namespace CrazyCharlyDay\controller;

class ControlleurConnexion {

    public function formulaireCo() {
        $vue = new VueConnexion("CONNEXION");
        $vue->render();
    }
}