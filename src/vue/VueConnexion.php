<?php

namespace crazy\vue;

use Slim\Slim;

class VueConnexion {
    private $html;

    public $selector;
    /**
     * @var string
     */
    private $URLbootstrapCSS;
    /**
     * @var string
     */
    private $URLbootstrapJS;
    /**
     * @var Slim|null
     */
    private $app;
    /**
     * @var string
     */
    private $URLcomptes;

    private $home;
    private $URLgestion;
       /**
    * @var string
    */
   private $URLcreneaux;
    private $URLConnexion;
    /**
     * @var string
     */
    private $URLconnexion;

    public function __construct($sel) {
      $this->app = Slim::getInstance();

      $this->URLgestion = $this->app->urlFor('afficher_liste_gestion_role');
      $this->selector = $sel;
      $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/css/bootstrap.css';
      $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/js/boostrap.min.js';
      $this->home= $this->app->urlFor('afficher_le_menu');
      $this->URLcomptes = $this->app->urlFor('afficher_les_comptes');
      $this->URLcreneaux = $this->app->urlFor('ajout');
      $this->URLconnexion = $this->app->urlFor('se_connecter');
    } 
    public function formulaireCo() {
    $this->html = <<<END
            <html lang="en">
                    <head>
                      <meta charset="utf-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                      <meta name="description" content="">
                      <meta name="author" content="">
                      <title>CoBoard</title>
                      <!-- Bootstrap core CSS -->
                      <link rel="stylesheet" href="$this->URLbootstrapCSS">
                      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                    </head>
                    <body>
                      <!-- Navigation -->
                      
                      <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
                        <div class="container">
                          <a class="navbar-brand" href="$this->home">CoBoard</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="$this->home">Home
                                  <span class="sr-only">(current)</span>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href=$this->URLcomptes>Comptes</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href=$this->URLcreneaux>Créneaux</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href=$this->URLconnexion>Se connecter</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </nav>
                      <!-- Page Content -->
                      <div class="container">
                     <h1 class="text-white pt-5">Epicerie Générale Nancy</h1>
                     <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                     <h3 class="text-white pt-2">61 Rue St Nicolas, 54000 Nancy</h2>
                       <div class="row">
                         <div class="col">
                        <form>  
                          <div class="form-group row pt-5">
                            <a href = $this->URLcomptes class="btn btn-primary">Voir les comptes</a>
                          </div>
                          <div class="form-group row">
                            <a href = $this->URLgestion class="btn btn-primary">Voir la liste de gestion des rôles</a>
                        </div>
                        <div class="form-group row">
                            <a href = $this->URLcreneaux class="btn btn-primary">Ajouter un créneau</a>
                          </div>
                          <div class="form-group row">
                            <a href = $this->URLconnexion class="btn btn-primary">Se connecter</a>
                          </div>
                        </form>
                      </div>
                         <div class="col">
                         <p class="text-white text-justify">Quoi que puisse dire Aristote, et toute la philosophie, il n’est rien d’égal au tabac, c’est la passion des honnêtes gens ; et qui vit sans tabac, n’est pas digne de vivre ; non seulement il réjouit, et purge les cerveaux humains, mais encore il instruit les âmes à la vertu, et l’on apprend avec lui à devenir honnête homme. Ne voyez-vous pas bien dès qu’on en prend, de quelle manière obligeante on en use avec tout le monde, et comme on est ravi d’en donner, à droit, et à gauche, partout où l’on se trouve ? On n’attend pas même qu’on en demande, et l’on court au-devant du souhait des gens : tant il est vrai, que le tabac inspire des sentiments d’honneur, et de vertu, à tous ceux qui en prennent. Mais c’est assez de cette matière, reprenons un peu notre discours. Si bien donc, cher Gusman, que Done Elvire ta maîtresse, surprise de notre départ, s’est mise en campagne après nous ; et son cœur, que mon maître a su toucher trop fortement, n’a pu vivre, dis-tu, sans le venir chercher ici ? Veux-tu qu’entre nous je te dise ma pensée ; J’ai peur qu’elle ne soit mal payée de son amour, que son voyage en cette ville produise peu de fruit, et que vous eussiez autant gagné à ne bouger de là.</p> 
                         <img src="img/paniers-0.jpg" class="img-thumbnail" alt="Panier" height="500" width="500">
                         </div>
                      </div>
                      <!-- Bootstrap core JavaScript -->
                      <script src="$this->URLbootstrapJS"></script>
            </body>
        </html> 
END;
    } 
    public function afficherPageCompte(){
      if (isset($_SESSION['user_connected'])){
          $res = "Vous êtes connecté sur le compte : " . $_SESSION['user_connected']['nom'];
          $res = $res . <<<END
          <div class="alert alert-success" role="alert">
          This is a success alert—check it out!
          </div>
END; $this->app->redirect($this->app->urlFor('afficher_le_menu'));
      }else{
          $res = "Vous n'avez pas réussi à vous connecter";
          $res = $res . <<<END
          <div class="alert alert-danger" role="alert">
          This is a danger alert—check it out!
          </div>
END; $this->app->redirect($this->app->urlFor('afficher_les_comptes'));
      }
      $this->html =  $this->html . $res;
  }

    public function render() {
        if ($this->selector == "CONNEXION") {
            $this->formulaireCo();
            echo ($this->html);
        }
        if ($this->selector == "HORS-LIGNE") {
          $this->afficherPageCompte();
          echo ($this->html);
        }
    }
}