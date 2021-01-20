<?php

require_once 'models/categoria.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();
        require_once 'views/administrador/aside.php';
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/administrador/aside.php';
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST)){
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);

            $crear = $categoria->save();

            if($crear){
                $_SESSION['crear_categoria'] = 'correcto';
            }else{
                $_SESSION['crear_categoria'] = 'incorrecto';
            }
        }else{
            $_SESSION['crear_categoria'] = 'incorrecto';
        }
        header("Location:".base_url.'Categoria/crear');
    }
}

?>