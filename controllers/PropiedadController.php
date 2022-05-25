<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController{

    //***
    public static function index(Router $router){

        $propiedades=Propiedad::all();
        $resultado= null;

        $router->render('propiedades/admin',[
            //Esta sintaxis no declara una variable como tal, solo estamos pasadno un arreglo
            //Se declara una atributo en del arreglo, que puede ser lo que sea, entonces la variable $$key guardara ese atributo con el nombre que sea
            'propiedades'=>$propiedades,
            'resultado'=>$resultado

        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores= Vendedor::all();

        $router->render('propiedades/crear',[
            'propiedad'=>$propiedad,
            'vendedores'=>$vendedores
        ]);
    }

    public static function actualizar(){
        echo 'Actualizar';
    }

}
