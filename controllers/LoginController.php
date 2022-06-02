<?php

namespace Controllers;
use MVC\Router;
use MVC\models\Admin;


class LoginController{

    public static function login(Router $router){
        $errores=[];

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $auth=new Admin($_POST);
            $errores=$auth->validar();

            if(empty($errores)){
                //Verificar si el usuario existe


                //Verificar el password


                //Verificar el usuario
            }
        }

        $router->render('auth/login',[
            'errores'=>$errores
        ]);
    }

    public static function logout(){
        echo 'DESDE LOGOUT';
    }
}