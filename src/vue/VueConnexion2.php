<?php
namespace crazy\vue;
use Slim\Slim;

class VueConnexion2{
    private $html;
    private $URLbootstrapCSS;
    private $URLbootstrapJS;
    private $app;
    private $URLcomptes;
    private $home;
    private $URLgestion;
    private $URLcreneaux;
    private $user;

    public function __construct($user) {
        $this->app = Slim::getInstance();
        $this->home= $this->app->urlFor('afficher_le_menu');
        $this->URLgestion = $this->app->urlFor('afficher_liste_gestion_role');
        $this->user = $user;
        $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/css/bootstrap.css';
        $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/js/boostrap.min.js';
        $this->URLcomptes = $this->app->urlFor('afficher_les_comptes');
        $this->URLcreneaux = $this->app->urlFor('ajout');
    }

    public function render($choix){
        if($choix == "TRUE"){
            $this->reussirConnexion();
            echo $this->html;
        }else if($choix == "CREATE"){
            $this->creerFormulaire();
            echo $this->html;
        }
    }

    public function creerFormulaire(){
        $url = $this->app->urlFor('valider_connexion');
        $res ="
        <form class=\"form-horizontal\" action=$url>
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"username\">Login</label>  
  <div class=\"col-md-4\">
  <input id=\"username\" name=\"username\" type=\"text\" placeholder=\"Login\" class=\"form-control input-md\" required=\"\">
    
  </div>
</div>

<!-- Password input-->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"password\">Mot de passe</label>
  <div class=\"col-md-4\">
    <input id=\"password\" name=\"password\" type=\"password\" placeholder=\"Mot de Passe\" class=\"form-control input-md\" required=\"\">
    
  </div>
</div>

<!-- Button -->
<div class=\"form-group\">
  <label class=\"col-md-4 control-label\" for=\"valider2\"></label>
  <div class=\"col-md-4\">
    <button id=\"valider2\" name=\"valider2\" class=\"btn btn-primary\">Se Connecter</button>
  </div>
</div>

</fieldset>
</form>
";
        $this->html = $res;

    }
    public function reussirConnexion(){
        $user = $this->user;
        $res = "<p>Vous êtes connecté avec le compte : $user->name";
        $this->html = $res;
    }

}
