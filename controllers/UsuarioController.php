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
        if(isset($_POST)){

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['login'] = $identity;

                //crear sesion admin en caso de ser necesario
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }

                header("Location:".base_url);

            }else{
                header("Location:".base_url."Usuario/access");
                $_SESSION['login_error'] = 'Datos incorrectos';
            }
        }else{
            header("Location:".base_url."Usuario/access");
            $_SESSION['login_error'] = 'Datos incorrectos';
        }
    }

    public function logout(){
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }
        
        header("Location:".base_url);
    }
}

?>