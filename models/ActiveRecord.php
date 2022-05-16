<?php

namespace Model;

class ActiveRecord
{
    //Base de datos

    //La hacemos protected porque solo queremos acceder a ella en la clase, no en alguna otra parte de la pagina
    //static porque no requerimos conectar a la base de datos con cada instancia, porque son siempre las mismas credenciales.

    //$db nunca se va construir de nuevo, por eso es static.
    protected static $db;
    protected static $columnas_DB =[];
    protected static $tabla='';

    //Errores
    protected static $errores=[];


    //Defenir la conexion a la base de datos
    public static function setDB($database){
        self::$db=$database;
    }



    public function guardar(){
        if(!is_null($this->id)){
            //actualizar
            $this->actualizar();
        }else{
            //Crear nuevo registro
            $this->crear();
        }
    }

    public function crear(){

        //sanitizar los datos
        $atributos= $this->sanitizarAtributos();

        //Convirtiendo las claves del objeto a strings para poder usarlos al momento de insertar los datos a la DB
        $string=join(', ',array_keys($atributos));



        //Insertar en la base de datos
        //Concatenamos los datos usando las funciones de array_keys y arrar_values
        $query= "INSERT INTO ". static::$tabla . " (";
        $query.= join(', ',array_keys($atributos));
        $query.=" ) VALUES (' ";
        $query.= join("', '",array_values($atributos));
        $query.= " ')";

        $resultado=self::$db->query($query);
        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }

    }

    public function actualizar(){
        $atributos= $this->sanitizarAtributos();
        $valores=[];
        foreach ($atributos as $key =>$value ){
            $valores[]="{$key}='{$value}'";
        }
        $query="UPDATE ". static::$tabla . " SET ";
        $query.=join(', ',$valores);
        $query.= "WHERE id = '" . self::$db->escape_string($this->id). "' ";
        $query.="LIMIT 1";



        $resultado= self::$db->query($query);
        if ($resultado) {
            //Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }


    }

    //eliminar registro
    public function eliminar(){
        $query = "DELETE FROM ". static::$tabla ." WHERE id = ". self::$db->escape_string($this->id). " LIMIT 1";
        $resultado= self::$db->query($query);

        if($resultado){
            $this->eliminarImagen();
            header('location: /admin?resultado=3');
        }

    }

    //Funcion para identificar y unir los atributos de la DB
    public function atributos(){
        $atributos=[];
        foreach (static::$columnas_DB as $columna){
            if($columna=='id')continue;
            $atributos[$columna]=$this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos=$this->atributos();
        $sanitizado= [];


        //Lo recorremos como arreglo asociativo, ya que necesitamos la clave y el valor del dato
        foreach ($atributos as $key => $value){
            $sanitizado[$key]= self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen){
        //Elimina la imagen anterior
        if(!is_null($this->id)){
            $this->eliminarImagen();
        }
        //asignar al atributo imagen el nombre de la imagen
        if($imagen){
            $this->imagen=$imagen;
        }
    }

    public function eliminarImagen(){
        //Comprobar si existe archivo
        $existeArchivo=file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArchivo){
            //unlink funciona para eliminar archivos
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //Validacion
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        //VALIDACIONES
        static::$errores=[];
        return static::$errores;
    }
    //Lista todos los registros
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado= self::consultarSQL($query);
        return $resultado;
    }

    //Obtiene determinado numero de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado= self::consultarSQL($query);
        return $resultado;
    }

    //Buscar propiedad por su ID
    public static function find($id){
        $query="SELECT * FROM ". static::$tabla ." WHERE id = {$id}";

        $resultado = self::consultarSQL($query);

        //array_shift es una funcion de php que retorna el primer elemento de un arreglo
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado=self::$db->query($query);

        //iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[]= static::crearObjeto($registro);
        }


        //Liberar memoria
        $resultado->free();
        //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto= new static;

        foreach ($registro as $key =>$value){
            //property_exists, verifica si una propiedad existe
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach ($args as $key=>$value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}