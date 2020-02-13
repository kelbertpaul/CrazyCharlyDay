<?php

session_start();
require 'vendor/autoload.php';
use crazy\controller\ControlleurConnexion;
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

$app->run();
