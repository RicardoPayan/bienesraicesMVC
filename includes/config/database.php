<?php

/*Funcion para conectar a la base de datos*/
function conectarDB(): mysqli{
    $db = new mysqli('localhost','root','root','bienes_raices');

    if(!$db){
        echo 'Error: no se pudo conectar';
        exit() /*Si no se pudo conectar, nos salimos y no se ejectua el codigo*/;
    }

    return $db; /*Devolvemos la instancia con el estado de conexion de la base de datos*/
}
