<?php

namespace MVC\models;
use Model\ActiveRecord;

class Admin extends ActiveRecord {
    //Base de datos

    protected static $tabla = 'usuarios';
    protected static $columnas_DB=['id','email','password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args=[]){
        $this->id=$args['id'] ?? null;
        $this->email=$args['email'] ?? '';
        $this->password=$args['password'] ?? '';
    }

    public function validar(){
        if(!$this->email){
            self::$errores[]='El email es obligatorio';
        }

        if(!$this->password){
            self::$errores[]='El password es obligatorio';
        }
    }
}