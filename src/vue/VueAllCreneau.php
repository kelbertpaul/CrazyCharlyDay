<?php


namespace crazy\vue;


use DateInterval;
use DateTime;
use Slim\Slim;

class VueAllCreneau
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

    public function __construct($sel, $list)
    {
        $this->selector = $sel;
        $this->app = Slim::getInstance();
        $this->URLbootstrapCSS = $this->app->request->getRootUri() . '/public/css/bootstrap.css';
        $this->URLbootstrapJS = $this->app->request->getRootUri() . '/public/js/boostrap.min.js';
        $this->redirectURL = $this->app->urlFor('ajoutCreneauValidation');
        $this->liste = $list;
    }



    public function formulaireCreneauOKCBon()
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
                          <a class="navbar-brand" href="#">CoBoard</a>
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
        if ($this->selector == "creneauAjoute") {
            $this->formulaireCreneauOKCBon();
            echo $this->html;
        }
    }

    function calc_date($ancre, $semaine, $jour, $cycle = 0)
    {
        // On vérifie les paramètres...
        if ((gettype($cycle) !== 'integer') || ($cycle < 0))
            throw new Exception('calc_date : mauvais numéro de cycle');

        if ((gettype($semaine) !== 'string') || (strlen($semaine) != 1) ||
            (ord($semaine) - ord('A') < 0) || (ord($semaine) - ord('A') > 3))
            throw new Exception('calc_date : le n° de semaine doit être entre A et D (inclus)');

        if ((gettype($jour) !== 'integer') || ($jour < 1) || ($jour > 7))
            throw new Exception('calc_date : le n° de jour doit être entre 1 et 7 (inclus)');

        // On calcule le jour recherché (décalage entier par rapport
        // à la date de départ -- « l'ancre »)
        $nb_jours = $cycle * 28 + (ord($semaine) - ord('A')) * 7 + $jour - 1;
        $date_init = new DateTime($ancre);
        $date_res = $date_init->add(new DateInterval('P' . $nb_jours . 'D'))->format('U');

        // Attention, distinguo Windows/reste du monde (Windows, WinNT, Win32)
        $format_jour_no = (preg_match('#win[dn3]#', PHP_OS))? '%#d' : '%e';

        // Génération du résultat
        return (object) [
            'jour_no' => strftime($format_jour_no, $date_res),
            'jour_nom_court' => strftime('%a', $date_res),
            'jour_nom' => strftime('%A', $date_res),
            'mois_no' => strftime('%m', $date_res),
            'mois_nom_court' => strftime('%b', $date_res),
            'mois_nom' => strftime('%B', $date_res),
            'annee_no' => strftime('%Y', $date_res),
            'annee_no_court' => strftime('%y', $date_res)
        ];
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




}