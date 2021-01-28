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
        $this->id = $id;
    }

    function setUsuario_id($usuario_id): void {
        $this->usuario_id = $usuario_id;
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
            ."'confirm',"
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
}