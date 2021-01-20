<?php
class ErrorController{

    public function index(){

        if(Utils::isAdmin()){
            require_once 'views/administrador/aside.php';
        }

        echo "<h1>La página que buscas no existe...</h1>";
    }
}
?>