<?php
class ErrorController{

    public function index(){

        if(Utils::isAdmin()){
            require_once 'views/administrador/aside.php';
        }

        require_once 'views/errores/404.php';
    }
}
?>