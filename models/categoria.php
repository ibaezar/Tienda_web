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
        $this->id = $id;
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

    public function save(){
        $sql = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}');";
        $save = $this->database->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}

?>