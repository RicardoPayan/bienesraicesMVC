
<?php
define('TEMPLATES_URL',__DIR__ . '/templates'); /*DIR es una superglobal de PHP, nos trae la ruta de archivo donde ponemos esta global*/
define('FUNCIONES_URL',__DIR__.'funciones.php');
define('CARPETA_IMAGENES', __DIR__.'/../imagenes/');

function incluirTemplate(string $nombre, bool $inicio=false){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado(){
    session_start();

    if(!$_SESSION['login']){
       header('Location: /');
    }
}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

//Escapa /Sanitizar el html
function s($html): string{
    $s= htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo){
    $tipos=['vendedor','propiedad'];
    return in_array($tipo, $tipos);
}

//Muestra los mensajes
function mostrarNotificacion($codigo){
    $mensaje='';
    switch ($codigo){
        case 1:
            $mensaje='Creado correctamente';
            break;

        case 2:
            $mensaje='Actualizado correctamente';
            break;

        case 3:
            $mensaje='Elimado correctamente';
            break;

        default:
            $mensaje=false;

    }
    return $mensaje;
}