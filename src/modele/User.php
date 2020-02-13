<?php
namespace crazy\modele;
class User extends \Illuminate\Database\Eloquent\Model {
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamp = false;
}