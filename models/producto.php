<?php

require_once 'config/database.php';

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $detalle;
    private $precio;
    private $stock;
    private $oferta;
    private $imagen;
    private $ruta_imagen;
    private $fecha;

    private $database;

    function __construct(){
        //Conexion a la base de datos
        $this->database = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getRuta_imagen() {
        return $this->ruta_imagen;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id): void {
        $this->categoria_id = (int)$categoria_id;
    }

    function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion): void {
        $this->descripcion = $descripcion;
    }

    function setDetalle($detalle): void {
        $this->detalle = $detalle;
    }

    function setPrecio($precio): void {
        $this->precio = (int)$precio;
    }

    function setStock($stock): void {
        $this->stock = (int)$stock;
    }

    function setOferta($oferta): void {
        $this->oferta = $oferta;
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    function setRuta_imagen($ruta_imagen): void {
        $this->ruta_imagen = $ruta_imagen;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function getAll(){
        $result = false;
        $show = $this->database->query("SELECT * FROM productos ORDER BY id ASC");
        if($show){
            $result = $show;
        }
        return $result;
    }

    public function getOne(){
        $resul = false;
        $show = $this->database->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        if($show){
            $resul = $show->fetch_object();
        }
        return $resul;
    }

    public function getForCategory($id){
        $resul = false;
        $show = $this->database->query("SELECT * FROM productos WHERE categoria_id = {$id}");
        if($show){
            $resul = $show;
        }
        return $resul;
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES("
            ."null,"
            ."{$this->getCategoria_id()},"
            ."'{$this->getNombre()}',"
            ."'{$this->getDescripcion()}',"
            ."'{$this->getDetalle()}',"
            ."{$this->getPrecio()},"
            ."{$this->getStock()},"
            ."'{$this->getOferta()}',"
            ."'{$this->getImagen()}',"
            ."'{$this->getRuta_imagen()}',"
            ."CURDATE()"
        .");";

        /*
        var_dump($sql);
        var_dump($this->getCategoria_id());
        var_dump($this->getPrecio());
        var_dump($this->getStock());
        die();
        */

        $save = $this->database->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}