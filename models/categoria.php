<?php

require_once 'config/database.php';

class Categoria{
    private $id;
    private $nombre;
    private $database;

    function __construct(){
        //Conexion a la base de datos
        $this->database = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id): void {
        $this->id = (int)$id;
    }

    function setNombre($nombre): void {
        $this->nombre = $this->database->real_escape_string($nombre);
    }

    public function showAll(){
        $result = false;
        $show = $this->database->query("SELECT * FROM categorias ORDER BY id ASC");
        if($show){
            $result = $show;
        }
        return $result;
    }

    public function getOne(){
        $result = false;
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()}";
        $get = $this->database->query($sql);
        if($get){
            $result = $get->fetch_object();
        }
        return $result;
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}');";
        $save = $this->database->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function editar(){
        $result = false;
        $sql = "UPDATE categorias SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()}";
        $update = $this->database->query($sql);
        if($update){
            $result = $update;
        }
        return $result;
    }

}

?>