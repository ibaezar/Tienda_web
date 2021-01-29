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

    //Redireccionar en caso de no ser estár logeado
    public static function isLoged(){
        if(!isset($_SESSION['login'])){
            header("Location:".base_url."Carrito/index");
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

    //Mostrar marcas
    public static function showMarca(){
        require_once 'models/marca.php';
        $marca = new Marca();
        $result = $marca->getAll();
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

    //Mostrar estado del carrito de compras
    public static function stateCart(){
        $state = array(
            'count' => 0,
            'total' => 0
        );

        if(isset($_SESSION['carrito'])){
            foreach($_SESSION['carrito'] as $producto){
                $unidades = $producto['unidades'];
                $state['count'] += $unidades;
            }
            foreach($_SESSION['carrito'] as $producto){
                $state['total'] += $producto['precio']*$producto['unidades'];
            }
        }

        return $state;
    }
}

?>