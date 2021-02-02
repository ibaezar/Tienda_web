<?php

require_once 'models/categoria.php';

class CategoriaController{

    public function index(){
        Utils::isAdmin();
        require_once 'views/categoria/index.php';
    }

    public function crear(){
        Utils::isAdmin();
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

    public function update(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $_SESSION['categoria'] = $_GET['id'];
            $id = $_GET['id'];
            $categoria = New Categoria();
            $categoria->setId($id);
            $nombre_categoria = $categoria->getOne()->nombre;
        }else{
            header("Location:".base_url."categoria/index");
        }
        require_once 'views/categoria/editar.php';
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_POST['nombre']) && isset($_SESSION['categoria'])){
            $id = $_SESSION['categoria'];
            $nombre_categoria = $_POST['nombre'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria->setNombre($nombre_categoria);
            $update = $categoria->editar();
            if($update){
                $_SESSION['editar_categoria'] = 'correcto';
            }else{
                $_SESSION['editar_categoria'] = 'incorrecto';
            }
        }else{
            $_SESSION['editar_categoria'] = 'incorrecto';
        }
        header("Location:".base_url."Categoria/update&id=".$id);
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $delete = $categoria->eliminar();
            if($delete){
                $_SESSION['eliminar_categoria'] = 'correcto';
            }else{
                $_SESSION['eliminar_categoria'] = 'incorrecto';
            }
        }else{
            $_SESSION['eliminar_categoria'] = 'incorrecto';
        }
        header("Location:".base_url."Categoria/index");
    }
}

?>