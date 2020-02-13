<?php
session_start();
require 'vendor/autoload.php';
$app = new \Slim\Slim();

use Illuminate\Database\Capsule\Manager as DB;

$file = parse_ini_file('src/conf/conf.ini');
$db = new DB();
$db->ddConnection($file);
$db->setAsGlobal();
$db->bootEloquent();

$app->get('/principal/afficher', function(){

})->name('afficher_le_menu');

$app->run();
