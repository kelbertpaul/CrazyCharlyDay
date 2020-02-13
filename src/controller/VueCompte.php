<?php


namespace crazy\controller;


use Slim\Slim;

class VueCompte
{
    /**
     * @var Slim|null
     */
    private $app;
    /**
     * @var string
     */
    private $URLbootstrapCSS;
    /**
     * @var string
     */
    private $URLbootstrapJS;
    /**
     * @var string
     */
    private $URLcomptes;

    /**
     * VueCompte constructor.
     * @param $user
     */
    public function __construct()
    {
        $this->app = Slim::getInstance();
        $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/css/bootstrap.css';
        $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/js/boostrap.min.js';
        $this->URLcomptes = $this->app->urlFor('afficher_les_comptes');
    }

    public function render(){
        echo $this->afficherPageCompte();
    }

    public function afficherPageCompte(){
        if (isset($_SESSION['user_connected'])){
            $res = "Vous êtes connecté sur le compte : " . $_SESSION['user_connected']['nom'];
        }else{
            $res = "Vous n'avez pas réussi à vous connecter";
        }
        return $res;
    }
}