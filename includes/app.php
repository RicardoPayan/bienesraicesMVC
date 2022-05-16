<?php
require 'funciones.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

//Conectar a la base de datos
use Model\ActiveRecord;
$db=conectarDB();

//Con esto, todos los objetos que creemos de tipo propiedad van a tener esa referencia al a base de datos
ActiveRecord::setDB($db);
