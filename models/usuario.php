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

    function getRuta_imagen() {
        return $this->ruta_imagen;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id): void {
        $this->id = (int)$id;
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
        $this->password = $password;
    }

    function setRol($rol): void {
        $this->rol = $rol;
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

    public function getOne(){
        $result = false;
        $sql = "SELECT * FROM usuarios WHERE id = {$this->getId()}";
        $get = $this->database->query($sql);
        if($get){
            $result = $get;
        }
        return $result;
    }

    public function save(){
        //cifrar contraseña
        $password_cifrada = password_hash($this->database->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
        $sql = "INSERT INTO usuarios VALUES("
        ."null," 
        ."'{$this->getNombre()}'," 
        ."'{$this->getApellidos()}'," 
        ."'{$this->getEmail()}'," 
        ."'{$password_cifrada}'," 
        ."'user'," 
        ."null," 
        ."CURDATE()"
        .");";
        
        $save = $this->database->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;

    }

    public function login(){
        $result = false;
        //Contenido enviado desde el controlador
        $email = $this->email;
        $password = $this->password;

        //Comprobar si existe el usuario en la bd
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->database->query($sql);

        if($login && $login->num_rows == 1){
            $usuario = $login->fetch_object();
            //Verificar la contraseña
            $verify = password_verify($password, $usuario->password);

            if($verify){
                $result = $usuario;
            }
        }
        return $result;
    }

    public function editar($option){
        $result = false;
        switch($option){
            case 1:
                $sql = "UPDATE usuarios SET "
                ."nombre = '{$this->getNombre()}', "
                ."apellidos = '{$this->getApellidos()}' "
                ."WHERE id = {$this->getId()};";
                $editar = $this->database->query($sql);
                if($editar){
                    $result = $editar;
                }
                break;
            case 2:
                $sql = "UPDATE usuarios SET "
                ."nombre = '{$this->getNombre()}', "
                ."apellidos = '{$this->getApellidos()}', "
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
}

?>