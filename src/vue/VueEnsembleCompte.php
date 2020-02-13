<?php

namespace crazy\vue;

use Slim\Slim;

class VueEnsembleCompte
{

    /**
     * @var Slim|null
     */
    private $app;
    /**
     * @var string
     */
    private $URLbootstrapJS;
    /**
     * @var string
     */
    private $URLbootstrapCSS;
    private $html;
    private $item;

    public function __construct($item)
    {
        $this->app = Slim::getInstance();
        $this->item = $item;
        $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/css/bootstrap.css';
        $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/js/boostrap.min.js';
    }

    public function render()
    {
        echo $this->afficherComptes();
    }

    private function afficherComptes()
    {
        $res = '';
        foreach ($this->item as $value) {
            $id = $value->id;
            $lien = $this->app->urlFor('connexion_compte_sans_auth', ['id' => $id]);
            $res = $res . "
            <a href=$lien class = 'text-black-50'>
                <div class ='affichageCompte'>
                $value->nom
                </div>
                </a></br>
            ";
        }
        return "<h1>Liste des Comptes Possibles</h1></br> $res";
    }
}