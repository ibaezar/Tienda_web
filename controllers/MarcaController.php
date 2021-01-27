<?php

require_once 'models/marca.php';

class MarcaController{

    public function index(){
        Utils::isAdmin();
        require_once 'views/marca/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/marca/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST)){
            $marca = new Marca();
            $marca->setNombre($_POST['nombre']);

            $crear = $marca->save();

            if($crear){
                $_SESSION['crear_marca'] = 'correcto';
            }else{
                $_SESSION['crear_marca'] = 'incorrecto';
            }
        }else{
            $_SESSION['crear_marca'] = 'incorrecto';
        }
        header("Location:".base_url.'marca/crear');
    }
}

?>