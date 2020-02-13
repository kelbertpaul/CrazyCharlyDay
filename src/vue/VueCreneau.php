<?php

namespace crazy\vue;

use Slim\Slim;

class VueCreneau
{
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
    private $redirectURL;
    private $liste;
    /**
     * @var string
     */
    private $home;

    public function __construct($sel, $list)
    {
        $this->selector = $sel;
        $this->app = Slim::getInstance();
        $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/css/bootstrap.css';
        $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/js/boostrap.min.js';
        $this->redirectURL = $this->app->urlFor('ajoutCreneauValidation');
        $this->home = $this->app->urlFor("afficher_le_menu");
        $this->liste = $list;
    }

    public function formulaireCreneau()
    {
        $afficherCreneaux = $this->afficherCreneaux();
        $html = <<<END
            <html lang="fr">
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
                                <a class="nav-link" href="#">Home
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
                        <form id="myForm" method="post" action="$this->redirectURL" >
	<br>Jour *<br><select name="select1" id="select1" required >
		<option value="1" selected="selected">1</option>
		<option value="2" >2</option>
		<option value="3" >3</option>
		<option value="4" >4</option>
		<option value="5" >5</option>
		<option value="6" >6</option>
		<option value="7" >7</option>

	</select>
	<br>Semaine *<br><select name="select2" id="select2" required >
		<option value="A" selected="selected">A</option>
		<option value="B" >B</option>
		<option value="C" >C</option>
		<option value="D" >D</option>
	</select>
	<br>Heure d&eacute;but *<br><input name="number3" id="number3" type="number" required>
	<br>Heure fin<br><input name="number4" id="number4" type="number" >
	<br><input class="btn btn-primary" name="submit5" type="submit" value="Valider" >
</form>
$afficherCreneaux
                      </div>
                      <!-- Bootstrap core JavaScript -->
                      <script src="$this->URLbootstrapJS"></script>
            </body>
        </html> 
END;
        $this->html = $html;
    }

    public function render()
    {
        if ($this->selector == "nouveau") {
            $this->formulaireCreneau();
            echo $this->html;
        } else if ($this->selector == "erreurDate") {
            $this->formulaireCreneauApresErreur();
            echo $this->html;
        } else if ($this->selector == "apAjout") {
            $this->formulaireCreneauApres();
            echo $this->html;

        }
    }

    private function formulaireCreneauApresErreur()
    {
        $html = <<<END
            <html lang="fr">
                    <head>
                      <meta charset="utf-8">
                      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                      <meta name="description" content="">
                      <meta name="author" content="">
                      <title>Bare - Start Bootstrap Template</title>
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
                          <a class="navbar-brand" href="$this->home">Start Bootstrap</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                          <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ml-auto">
                              <li class="nav-item active">
                                <a class="nav-link" href="#">Home
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
                      <div class="alert alert-danger" role="alert">
L'heure de fin doit être inférieure à celle de début ! Les heures doivent être comprises entre 0 et 24 !
</div>
                      <div class="container">
                        <form id="myForm" method="post" action="$this->redirectURL" >
	<br>Jour *<br><select name="select1" id="select1" required >
		<option value="1" selected="selected">1</option>
		<option value="2" >2</option>
		<option value="3" >3</option>
		<option value="4" >4</option>
		<option value="5" >5</option>
		<option value="6" >6</option>
		<option value="7" >7</option>

	</select>
	<br>Semaine *<br><select name="select2" id="select2" required >
		<option value="A" selected="selected">A</option>
		<option value="B" >B</option>
		<option value="C" >C</option>
		<option value="D" >D</option>
	</select>
	<br>Heure d&eacute;but *<br><input name="number3" id="number3" type="number" required>
	<br>Heure fin<br><input name="number4" id="number4" type="number" >
	<br><input class="btn btn-primary" name="submit5" type="submit" value="Valider" >
</form>
                      </div>
                      <!-- Bootstrap core JavaScript -->
                      <script src="$this->URLbootstrapJS"></script>
            </body>
        </html> 
END;
        $this->html = $html;
    }



    private function afficherCreneaux()
    {
        $ancre = '2020-01-20';

        $res = "";
        foreach($this->liste as $value){
            $res = $res . "<div class=\"card\">
  <div class=\"card-body\">
    jour = $value->jour<br>
    semaine = $value->semaine<br>
    heure de début = $value->heureD<br>
    heure de fin = $value->heureF
  </div>
</div><br>";

        }
        return $res;
    }

    public function formulaireCreneauApres()
    {
        $afficherCreneaux = $this->afficherCreneaux();
        $html = <<<END
            <html lang="fr">
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
                                <a class="nav-link" href="#">Home
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
                                            <div class="alert alert-success" role="alert">
  Votre créneau a été enregistré !
</div>
                      <div class="container">
                            $afficherCreneaux
                      </div>
                      <!-- Bootstrap core JavaScript -->
                      <script src="$this->URLbootstrapJS"></script>
            </body>
        </html> 
END;
        $this->html = $html;
    }
}