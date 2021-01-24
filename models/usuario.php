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
        $this->password = $password;
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
}

?>