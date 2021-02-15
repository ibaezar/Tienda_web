<?php

require_once 'config/database.php';

class Producto{
    private $id;
    private $categoria_id;
    private $marca_id;
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

    function getMarca_id() {
        return $this->marca_id;
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

    function setMarca_id($marca_id): void {
        $this->marca_id = (int)$marca_id;
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
        $show = $this->database->query("SELECT p.*, c.nombre AS 'nombre_categoria', m.nombre AS 'nombre_marca' from productos p INNER JOIN categorias c ON categoria_id = c.id INNER JOIN marcas m ON marca_id = m.id;");
        if($show){
            $result = $show;
        }
        return $result;
    }

    public function getMax16(){
        $result = false;
        $show = $this->database->query("SELECT p.*, c.nombre AS 'nombre_categoria', m.nombre AS 'nombre_marca' from productos p INNER JOIN categorias c ON categoria_id = c.id INNER JOIN marcas m ON marca_id = m.id ORDER BY p.id DESC LIMIT 16;");
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

    public function getLastIdProducto(){
        $result = false;
        $sql = "SELECT MAX(id) AS 'producto_id' FROM productos;";
        $id = $this->database->query($sql);
        if($id){
            $result = $id->fetch_object();
        }
        return $result;
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
            ."{$this->getMarca_id()},"
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

        $save = $this->database->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function editar($opcion){
        $result = false;

        switch($opcion){
            case 1:
                $sql = "UPDATE productos SET " 
                ."nombre = '{$this->getNombre()}', " 
                ."descripcion = '{$this->getDescripcion()}', "
                ."detalle = '{$this->getDetalle()}', "
                ."precio = {$this->getPrecio()}, "
                ."stock = {$this->getStock()}, "
                ."oferta = '{$this->getOferta()}' "
                ."WHERE id = {$this->getId()};";

                $editar = $this->database->query($sql);
                if($editar){
                    $result = $editar;
                }
                break;
            case 2:
                $sql = "UPDATE productos SET " 
                ."nombre = '{$this->getNombre()}', " 
                ."descripcion = '{$this->getDescripcion()}', "
                ."detalle = '{$this->getDetalle()}', "
                ."precio = {$this->getPrecio()}, "
                ."stock = {$this->getStock()}, "
                ."oferta = '{$this->getOferta()}', "
                ."imagen = '{$this->getImagen()}', "
                ."ruta_imagen = '{$this->getRuta_imagen()}' "
                ."WHERE id = {$this->getId()};";

                $editar = $this->database->query($sql);
                if($editar){
                    $result = $editar;
                }
                break;
        }
        return $result;
    }

    public function eliminar(){
        $result = false;
        $sql = "DELETE FROM productos WHERE id = {$this->getId()}";
        $delete = $this->database->query($sql);
        if($delete){
            $result = $delete;
        }else{
            //Error 1451 (Constraint asociadas)
            $result = $this->database->errno;
        }
        return $result;
    }

}