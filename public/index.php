<?php
require_once __DIR__."/../includes/app.php";
use MVC\Router;
use Controllers\PropiedadController;

$router=new Router();

//Se define la URL, se le pasa el controlador y por ultimo se le pasa un metodo de ese controlador; que construye la vista
$router->get('/admin',[PropiedadController::class,'index']);
$router->get('/propiedades/crear',[PropiedadController::class,'crear']);
$router->post('/propiedades/crear',[PropiedadController::class,'crear']);
$router->get('/propiedades/actualizar',[PropiedadController::class,'actualizar']);
$router->comprobarRutas();