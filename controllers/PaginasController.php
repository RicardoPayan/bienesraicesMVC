<?php

namespace Controllers;


use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index(Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index',[
            'propiedades'=>$propiedades,
            'inicio'=>$inicio
        ]);
    }

    public static function nosotros(Router $router){
       $router->render('paginas/nosotros',[]);
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::all();

        $router->render('/paginas/propiedades',[
            'propiedades'=>$propiedades
        ]);
    }

    public static function propiedad(Router $router){

        $id= $_GET['id'];
        $id= filter_var($id, FILTER_VALIDATE_INT);

        //Si no hay id valido redirecciona a la pagina principal
        if(!$id){
            header('Location: /');
        }

        $propiedad = Propiedad::find($id);

        $router->render('/paginas/propiedad',[
            'propiedad'=>$propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('/paginas/blog',[]);
    }


    public static function entrada(Router $router){
        $router->render('paginas/entrada',[]);
    }

    public static function contacto(Router $router){
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD']==='POST'){
            $respuesta=$_POST['contacto'];

            //Crear una instancia de PHPMailer.
            $mail=new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host='smtp.mailtrap.io';
            $mail->SMTPAuth=true;
            $mail->Username='0907e2f8110da7';
            $mail->Password='c88a622b755602';
            $mail->SMTPSecure='tls';
            $mail->Port=2525;

            //Configurar el contenido del mail
            $mail->setFrom('admin@bienesraices.com'); //De quien viene
            $mail->addAddress('admin@bienesraices.com','BienesRaices.com'); //A quien va
            $mail->Subject='Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet='UTF-8';



            //Contenido
            $contenido= '<html>';
            $contenido.= '<p>Tienes un nuevo mensaje</p>';
            $contenido.= '<p>Nombre: '. $respuesta['nombre'] .'</p>';


            //Enviar de forma condicional algunos campos de email o telefono
            if($respuesta['contacto']==='telefono'){
                $contenido.='<p>Eligio ser contactado por telefono</p>';
                $contenido.= '<p>Telefono: '. $respuesta['telefono'] .'</p>';
                $contenido.= '<p>Fecha contacto: '. $respuesta['fecha'] .'</p>';
                $contenido.= '<p>Hora contacto: '. $respuesta['hora'] .'</p>';

            }else{
                //Es email, entonces agregamos el campo de email
                $contenido.='<p>Eligio ser contactado por Email</p>';
                $contenido.= '<p>Email: '. $respuesta['email'] .'</p>';
            }
            $contenido.= '<p>Mensaje: '. $respuesta['mensaje'] .'</p>';
            $contenido.= '<p>Vende o Compra: '. $respuesta['tipo'] .'</p>';
            $contenido.= '<p>Presupuesto: $'. $respuesta['precio'] .'</p>';
            $contenido.= '</html>';


            $mail->Body=$contenido;
            $mail->AltBody='Esto es texto alternativo sin HTML';

            //Enviar el email
            if($mail->send()){
                $mensaje='mensaje enviado correctamente';
            }else{
                $mensaje= 'El mensaje no se pudo enviar';
            }
        }


       $router->render('paginas/contacto',[
            'mensaje'=>$mensaje
       ]);
    }

}