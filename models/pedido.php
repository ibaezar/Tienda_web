<?php

require_once 'config/database.php';

class Pedido{
    private $id;
    private $usuario_id;
    private $ciudad;
    private $comuna;
    private $direccion;
    private $depto;
    private $observacion;
    private $valor;
    private $estado;
    private $fecha;
    private $hora;

    private $database;

    function __construct(){
        //Conexion a la base de datos
        $this->database = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getComuna() {
        return $this->comuna;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getDepto() {
        return $this->depto;
    }

    function getObservacion() {
        return $this->observacion;
    }

    function getValor() {
        return $this->valor;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id): void {
        $this->id = (int)$id;
    }

    function setUsuario_id($usuario_id): void {
        $this->usuario_id = (int)$usuario_id;
    }

    function setCiudad($ciudad): void {
        $this->ciudad = $ciudad;
    }

    function setComuna($comuna): void {
        $this->comuna = $comuna;
    }

    function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    function setDepto($depto): void {
        $this->depto = $depto;
    }

    function setObservacion($observacion): void {
        $this->observacion = $observacion;
    }

    function setValor($valor): void {
        $this->valor = $valor;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    function setHora($hora): void {
        $this->hora = $hora;
    }

    public function save(){
        $result = false;

        $sql = "INSERT INTO pedidos VALUES("
            ."null,"
            ."{$this->getUsuario_id()},"
            ."'{$this->getCiudad()}',"
            ."'{$this->getComuna()}',"
            ."'{$this->getDireccion()}',"
            ."'{$this->getDepto()}',"
            ."'{$this->getObservacion()}',"
            ."{$this->getValor()},"
            ."'pendiente',"
            ."CURDATE(),"
            ."CURTIME()"
        .");";

        $save = $this->database->query($sql);

        if($save){
            $result = $save;
        }
        return $result;
    }

    public function save_linea(){
        $result = false;
        //Obtener id del ultimo registro
        $sql = "SELECT LAST_INSERT_ID() as 'pedido'";
        $query = $this->database->query($sql);
        $pedido_id = (int)$query->fetch_object()->pedido;

        //Obtener todos id y unidades de los productos del carrito
        foreach($_SESSION['carrito'] as $productos){
            $producto = $productos['producto'];
            $sql = "INSERT INTO linea_pedido VALUES(null, {$pedido_id}, {$producto->id}, {$productos['unidades']});";
            $save = $this->database->query($sql);
        }

        if($query && $save){
            $result = true;
        }
        return $result;
    }

    public function getPedidos(){
        $result = false;
        $id_usuario = (int)$this->getUsuario_id();
        $sql = "SELECT u.id AS 'id_usuario', lp.pedido_id AS 'id_pedido', pr.id AS 'id_producto', pr.nombre AS 'producto', pr.precio AS 'precio', pr.imagen AS 'imagen', pr.ruta_imagen AS 'ruta_imagen', lp.unidades AS 'cantidad', pe.valor AS 'total_pagado', pe.fecha AS 'fecha_pedido' FROM linea_pedido lp INNER JOIN pedidos pe ON lp.pedido_id = pe.id INNER JOIN usuarios u ON pe.usuario_id = u.id INNER JOIN productos pr ON lp.producto_id = pr.id WHERE u.id = {$id_usuario} ORDER BY lp.pedido_id DESC;";

        $pedido = $this->database->query($sql);
        if($pedido){
            $result = $pedido;
        }
        return $result;
    }

    public function getLastIdPedido(){
        $result = false;
        $sql = "SELECT MAX(id) AS 'producto_id' FROM pedidos;";
        $id = $this->database->query($sql);
        
        if($id){
            $result = $id->fetch_object();
        }
        return $result;
    }

    public function getPedidosById(){
        $result = false;
        $id_usuario = $this->getUsuario_id();
        $id_pedido = $this->getId();
        $sql = "SELECT u.id AS 'id_usuario', lp.pedido_id AS 'id_pedido', pr.id AS 'id_producto', pr.nombre AS 'producto', pr.precio AS 'precio', pr.imagen AS 'imagen', pr.ruta_imagen AS 'ruta_imagen', lp.unidades AS 'cantidad', pe.valor AS 'total_pagado' FROM linea_pedido lp INNER JOIN pedidos pe ON lp.pedido_id = pe.id INNER JOIN usuarios u ON pe.usuario_id = u.id INNER JOIN productos pr ON lp.producto_id = pr.id WHERE u.id = {$id_usuario} AND pe.id = {$id_pedido} ORDER BY lp.id DESC;";

        $pedido = $this->database->query($sql);
        if($pedido){
            $result = $pedido;
        }
        return $result;
    }

    public function getDetalle(){
        $result = false;
        $id_usuario = $this->getUsuario_id();
        $sql = "SELECT * FROM pedidos WHERE usuario_id = {$id_usuario}";
        $detalle = $this->database->query($sql);

        if($detalle){
            $result = $detalle;
        }
        return $result;
    }

    public function getDetalleById(){
        $result = false;
        $id_usuario = $this->getUsuario_id();
        $id_pedido = $this->getId();
        $sql = "SELECT * FROM pedidos WHERE usuario_id = {$id_usuario} AND id = {$id_pedido}";
        $detalle = $this->database->query($sql);

        if($detalle){
            $result = $detalle;
        }
        return $result;
    }
}