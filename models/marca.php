<?php

require_once 'config/database.php';

class Marca{
    private $id;
    private $nombre;
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

    function getNombre() {
        return $this->nombre;
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

    function setNombre($nombre): void {
        $this->nombre = $this->database->real_escape_string($nombre);
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    function setRuta_imagen($ruta_imagen): void {
        $this->ruta_imagen = $ruta_imagen;
    }

    public function getAll(){
        $result = false;
        $show = $this->database->query("SELECT * FROM marcas ORDER BY id ASC");
        if($show){
            $result = $show;
        }
        return $result;
    }

    public function getOne(){
        $resul = false;
        $show = $this->database->query("SELECT * FROM marcas WHERE id = {$this->getId()}");
        if($show){
            $resul = $show->fetch_object();
        }
        return $resul;
    }

    public function save(){
        $result = false;
        $sql = "INSERT INTO marcas VALUES(null, '{$this->getNombre()}', '{$this->getImagen()}', '{$this->getRuta_imagen()}');";
        $save = $this->database->query($sql);
        if($save){
            $result = $save;
        }
        return $result;
    }

    public function editar(){
        $result = false;
        $sql = "UPDATE marcas SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()}";
        $update = $this->database->query($sql);
        if($update){
            $result = $update;
        }
        return $result;
    }

    public function editarImagen(){
        $result = false;
        $sql = "UPDATE marcas SET nombre = '{$this->getNombre()}', imagen = '{$this->getImagen()}', ruta_imagen = '{$this->getRuta_imagen()}' WHERE id = {$this->getId()}";
        $update = $this->database->query($sql);
        if($update){
            $result = $update;
        }
        return $result;
    }

    public function eliminar(){
        $result = false;
        $sql = "DELETE FROM marcas WHERE id = {$this->getId()}";
        $delete = $this->database->query($sql);
        if($delete){
            $result = $delete;
        }
        return $result;
    }
}

?>