<?php

class Utils{

    //Eliminar sesiones
    public static function eliminarSesion($nombre){
        if(isset($_SESSION[$nombre])){
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }
        return $nombre;
    }

    //Redireccionar en caso de no ser admin
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    //Mostrar categorias
    public static function showCategory(){
        require_once 'models/categoria.php';
        $categoria = new Categoria();
        $result = $categoria->showAll();
        return $result;
    }

    //Mostrar Productos
    public static function showProducts(){
        require_once 'models/producto.php';
        $producto = new Producto();
        $result = $producto->getAll();
        return $result;
    }

    //Mostrar Productos por categoria
    public static function showProductsForCategory($id){
        require_once 'models/producto.php';
        $producto = new Producto();
        $result = $producto->getForCategory($id);
        return $result;
    }
}

?>