<?php

session_start();

use crazy\controller\ControlleurConnexion;
use crazy\controller\ControlleurCreneau;
<<<<<<< HEAD
use crazy\controller\ControlleurListe;
=======

>>>>>>> eaeb3c889bc5ec3538b59f5573bf5e5d2be2e927
require 'vendor/autoload.php';
$app = new \Slim\Slim();

use Illuminate\Database\Capsule\Manager as DB;

$file = parse_ini_file('src/conf/conf.ini');
$db = new DB();
$db->addConnection($file);
$db->setAsGlobal();
$db->bootEloquent();

$app->get('/', function(){
    ControlleurConnexion::formulaireCo();
})->name('afficher_le_menu');

$app->get('/ajout', function(){
    ControlleurCreneau::nouveauCreneauForm();
})->name('ajout');

$app->post('/ajoutCreneauValidation', function(){
    ControlleurCreneau::ajout();
})->name('ajoutCreneauValidation');

$app->get('/comptes/afficher', function(){
    \crazy\controller\ControllerAuthentification::connecterCompteSansAuth();
})->name('afficher_les_comptes');

$app->get('/comptes/connected/:id', function($id){
    \crazy\controller\ControllerAuthentification::connecterComptePrecis($id);
})->name('connexion_compte_sans_auth');

$app->get('/gestion_role', function() {
    ControlleurListe::liste_gestion_role();
})->name('afficher_liste_gestion_role');


$app->run();