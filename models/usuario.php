<?php

require_once 'config/database.php';

class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $fecha;
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

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function getRol() {
        return $this->rol;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNombre($nombre): void {
        $this->nombre = $this->database->real_escape_string($nombre);
    }

    function setApellidos($apellidos): void {
        $this->apellidos = $this->database->real_escape_string($apellidos);
    }

    function setEmail($email): void {
        $this->email = $this->database->real_escape_string($email);
    }

    function setPassword($password): void {
        $this->password = password_hash($this->database->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function setRol($rol): void {
        $this->rol = $rol;
    }

    function setImagen($imagen): void {
        $this->imagen = $imagen;
    }

    function setFecha($fecha): void {
        $this->fecha = $fecha;
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null, CURDATE());";
        $save = $this->database->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;

    }
}

?>