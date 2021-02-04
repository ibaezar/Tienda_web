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

    public function editar(){
        $result = false;
        $sql = "UPDATE imagenes SET imagen = '{$this->getImagen()}', ruta_imagen = '{$this->getRuta_imagen()}' WHERE producto_id = {$this->getProducto_id()}";
        $editar = $this->database->query($sql);
        if($editar){
            $result = $editar;
        }
        return $result;
    }

    public function getAll(){
        $result = false;
        $sql = "SELECT * FROM imagenes WHERE producto_id = {$this->getProducto_id()}";
        $get = $this->database->query($sql);
        if($get){
            $result = $get;
        }
        return $result;
    }

    public function deleteAll(){
        $result = false;
        $sql = "DELETE FROM imagenes WHERE producto_id = {$this->getProducto_id()}";
        $delete = $this->database->query($sql);
        if($delete){
            $result = $delete;
        }
        return $result;
    }

}