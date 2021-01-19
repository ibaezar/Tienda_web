<?php

require_once 'models/usuario.php';

class UsuarioController{

    public function access(){
        require_once 'views/layout/access.php';
    }

    public function register(){
        require_once 'views/layout/register.php';
    }

    public function save(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $save = $usuario->save();

            if($save){
                $_SESSION['registro'] = 'correcto';
            }else{
                $_SESSION['registro'] = 'incorrecto';
            }
        }else{
            $_SESSION['registro'] = 'incorrecto';
        }
        header("Location:".base_url.'Usuario/register');
    }

    public function login(){
        
    }
}

?>