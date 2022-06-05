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

        session_start();
        $auth=$_SESSION['login'] ?? null;

        //Arreglo de rutas protegidas
        $rutasProtegidas=['/admin','/propiedades/crear','/propiedades/crear','/propiedades/actualizar',
            '/propiedades/eliminar','/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar'];



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

        //Proteger las rutas
        //in_array verifica si existe un elemento de un arreglo en otro
        if(in_array($urlActual, $rutasProtegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            //La URL existe y hay una funcion asociada
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