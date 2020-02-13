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

    public function __construct($sel) {
      $this->app = Slim::getInstance();
      $this->home= $this->app->urlFor('afficher_le_menu');
      $this->URLgestion = $this->app->urlFor('afficher_liste_gestion_role');
      $this->selector = $sel;
      $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/css/bootstrap.css';
      $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/js/boostrap.min.js';
      $this->URLcomptes = $this->app->urlFor('afficher_les_comptes');
    }
    public function formulaireCo() {
    $html = <<<END
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
                                <a class="nav-link" href="#">About</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Services</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </nav>
                      <!-- Page Content -->
                      <div class="container">
                        <form>
                          <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                          </div>
                          <div class="form-group row">
                            <button type="button" class="btn btn-primary">Se Connecter</button>
                          </div>
                          <div class="form-group row">
                            <a href = $this->URLcomptes class="btn btn-primary">Voir les comptes</a>
                          </div>
                          <div class="form-group row">
                            <a href = $this->URLgestion class="btn btn-primary">Voir la liste de gestion des rôles</a>
                        </div>
                        </form>
                      </div>
                      <!-- Bootstrap core JavaScript -->
                      <script src="$this->URLbootstrapJS"></script>
            </body>
        </html> 
END;
    $this->html = $html;
    }

    public function render() {
        if ($this->selector == "CONNEXION") {
            $this->formulaireCo();
            echo $this->html;
        }
    }
}