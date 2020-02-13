<?php

session_start();
require 'vendor/autoload.php';
use crazy\controller\ControlleurConnexion;
require 'vendor/autoload.php';
$app = new \Slim\Slim();

use crazy\controller\ControlleurCreneau;
use Illuminate\Database\Capsule\Manager as DB;

$file = parse_ini_file('src/conf/conf.ini');
$db = new DB();
$db->addConnection($file);
$db->setAsGlobal();
$db->bootEloquent();

$app->get('/', function(){
    ControlleurConnexion::formulaireCo();
})->name('afficher_le_menu');

$app->get('/ajoutCreneau', function(){
    ControlleurCreneau::nouveauCreneauForm();
});

$app->get('/bonjour', function(){
    echo 'bonjour';
});

$app->get('/comptes/afficher', function(){
    \crazy\controller\ControllerAuthentification::connecterCompteSansAuth();
})->name('afficher_les_comptes');

$app->get('/comptes/connected/:id', function($id){
    \crazy\controller\ControllerAuthentification::connecterComptePrecis($id);
})->name('connexion_compte_sans_auth');

$app->run();
