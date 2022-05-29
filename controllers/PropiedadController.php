<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{

    //***
    public static function index(Router $router){

        $propiedades=Propiedad::all();
        $vendedores=Vendedor::all();
        $resultado=$_GET['resultado'] ?? null;


        $router->render('propiedades/admin',[
            //Esta sintaxis no declara una variable como tal, solo estamos pasadno un arreglo
            //Se declara una atributo en del arreglo, que puede ser lo que sea, entonces la variable $$key guardara ese atributo con el nombre que sea
            'propiedades'=>$propiedades,
            'resultado'=>$resultado,
            'vendedores'=>$vendedores

        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedores= Vendedor::all();
        $errores=Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD']== 'POST'){
            //Crea una nueva instancia
            $propiedad=new Propiedad($_POST['propiedad']);

            //Crear carpeta
            $nombreImagen= md5(uniqid(rand(),true)).".jpg";

            //Setear imagen
            //Realiza un resize a la imagen con un intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $propiedad->setImagen($nombreImagen); //Al servidor solo le pasamos el nombre de la imagen

            }
            //Validar
            $errores=$propiedad->validar();
            if(empty($errores)){
                //files hacia una variable
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                $image->save(CARPETA_IMAGENES. $nombreImagen);

                //GUARDA EN LA BASE DE DATOS
                $propiedad->guardar();
            }

        }

        $router->render('propiedades/crear',[
            'propiedad'=>$propiedad,
            'vendedores'=>$vendedores,
            'errores'=>$errores
        ]);
    }

    public static function actualizar(Router $router){
        $id= validarORedireccionar('/admin');

        $vendedores= Vendedor::all();
        $propiedad= Propiedad::find($id);
        $errores=Propiedad::getErrores();

        //metodo post para actualizar
        if($_SERVER['REQUEST_METHOD']== 'POST'){

            //Asignar los atributos
            $args=$_POST['propiedad'];

            $propiedad->sincronizar($args);

            //Validacion
            $errores=$propiedad->validar();

            $nombreImagen= md5(uniqid(rand(),true)).".jpg";

            //Subida de archivos


            if (empty($errores)) {
                //save img
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                    $propiedad->setImagen($nombreImagen);
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $propiedad->guardar();
            }



        }

        $router->render('/propiedades/actualizar',[
            'propiedad'=>$propiedad,
            'errores'=>$errores,
            'vendedores'=>$vendedores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            //Validar ID
            $id= $_POST['id'];
            //Verificamos que si sea entero
            $id=filter_var($id,FILTER_VALIDATE_INT);

            if($id){
                $tipo=$_POST['tipo'];
                if (validarTipoContenido($tipo)){
                    $propiedad= Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }

}
