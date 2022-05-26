<?php

namespace MVC;

class Router
{
    public $rutasGET=[];
    public $rutasPOST=[];

    public function get($url,$fn){
        $this->rutasGET[$url]=$fn;
    }

    public function post($url,$fn){
        $this->rutasPOST[$url]=$fn;
    }

    public function comprobarRutas(){
        $urlActual = $_SERVER['REQUEST_URI'] ?? '/';

        if(strpos($urlActual, '?')){ // tuve que crear este if para que cuando sea un get, tome el redirect y no el request
            $urlActual = $_SERVER['REDIRECT_URL'];
        }

        $metodo= $_SERVER['REQUEST_METHOD'];


        if($metodo==='GET'){
            $fn= $this->rutasGET[$urlActual]?? null;

        }else{

            $fn= $this->rutasPOST[$urlActual] ?? null;
        }

        if($fn){
            call_user_func($fn,$this);
        }else{
            echo 'Pagina no encontrada';
        }
    }

    public function render($view, $datos = []) {
        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }
}