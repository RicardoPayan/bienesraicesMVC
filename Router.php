<?php
namespace MVC;
class Router{

    public function comprobarRutas(){
        $urlActual = $_SERVER['REQUEST_URI'] ?? '/';
        //debuguear($urlActual);
        //debuguear($_SERVER);
        if(strpos($urlActual, '?')){ // tuve que crear este if para que cuando sea un get, tome el redirect y no el request
            $urlActual = $_SERVER['REDIRECT_URL'];
        }
        debuguear($urlActual);
    }
}