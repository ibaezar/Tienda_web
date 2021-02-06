<?php

require_once 'config/database.php';

class Slider{
    private $id;
    private $imagen;


    private $database;

    function __construct(){
        //Conexion a la base de datos
        $this->database = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id): void {
        $this->id = (int)$id;
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    public function save(){
        $result = false;
        $sql = "INSERT INTO slider VALUES(null, '{$this->getImagen()}');";
        $save = $this->database->query($sql);
        if($save){
            $result = $save;
        }
        return $result;
    }

    public function getAll(){
        $result = false;
        $sql = "SELECT * FROM slider;";
        $get = $this->database->query($sql);
        if($get){
            $result = $get;
        }
        return $result;
    }

    public function deleteAll(){
        $result = false;
        $sql = "DELETE FROM slider;";
        $delete = $this->database->query($sql);
        if($delete){
            $result = $delete;
        }
        return $result;
    }
}