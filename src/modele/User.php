<?php
namespace CrazyCharlyDay\modele;
class User extends \Illuminate\Datebase\Eloquent\Model {
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timestamp = false;
}