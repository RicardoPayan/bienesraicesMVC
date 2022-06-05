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

    public function existeUsuario(){
        //Revisar si un usuario existe o no
        $query="SELECT * FROM ". self::$tabla . " WHERE email= '". $this->email . "' LIMIT 1";

        $resultado=self::$db->query($query);


        //En num_rows se registra algo si existe lo que se busca con la consulta de SQL
        if(!$resultado->num_rows){
            self::$errores[]='El usuario no existe';
            return;
        }
        //Si existe el usuario, entonces devolvemos el resultado de la consulta
        return $resultado;

    }

    public function comprobarPassword($resultado){
        $usuario=$resultado->fetch_object();

        //Esta parte comprueba que la contrasena sea correcta
        $autenticado=password_verify($this->password,$usuario->password);

        if(!$autenticado){
            self::$errores[]='El password es incorrecto';
        }
        return $autenticado;
    }

    public function autenticar(){
        session_start();

        //Llenar el arreglo de sesion
        $_SESSION['usuario']=$this->email;
        $_SESSION['login']=true;

        header('Location: /admin');

    }
}