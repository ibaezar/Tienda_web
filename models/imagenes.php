<?php

require_once 'config/database.php';

class Imagenes{
    private $id;
    private $producto_id;
    private $imagen;
    private $ruta_imagen;


    private $database;

    function __construct(){
        //Conexion a la base de datos
        $this->database = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getProducto_id() {
        return $this->producto_id;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getRuta_imagen() {
        return $this->ruta_imagen;
    }

    function setId($id): void {
        $this->id = (int)$id;
    }

    function setProducto_id($producto_id): void {
        $this->producto_id = (int)$this->database->real_escape_string($producto_id);
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    function setRuta_imagen($ruta_imagen): void {
        $this->ruta_imagen = $ruta_imagen;
    }

    public function save(){
        $result = false;
        $sql = "INSERT INTO imagenes VALUES(null, {$this->getProducto_id()}, '{$this->getImagen()}', '{$this->getRuta_imagen()}');";
        $save = $this->database->query($sql);
        if($save){
            $result = $save;
        }
        return $result;
    }

}