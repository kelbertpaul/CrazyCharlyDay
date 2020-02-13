<?php

session_start();

use crazy\controller\ControlleurConnexion;
use crazy\controller\ControlleurCreneau;

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

$app->get('/bonjour', function(){
    echo 'bonjour';
});

$app->run();