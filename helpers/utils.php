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

    //Eliminar un directorio
    public static function eliminar_directorio($directorio){
        $result = false;
        if(is_dir($directorio)){
            $delete = rmdir($directorio);
            if($delete){
                $result = true;
            }
        }
        return $result;
    }

    //Eliminar un fichero
    public static function eliminar_fichero($fichero){
        $result = false;
        if(is_file($fichero)){
            $delete = unlink($fichero);
            if($delete){
                $result = true;
            }
        }
        return $result;
    }

    //Redireccionar en caso de no ser admin
    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            //header("Location:".base_url);
            echo '<script>window.location="'.base_url.'"</script>';
        }else{
            return true;
        }
    }

    //Redireccionar en caso de no ser estár logeado
    public static function isLoged(){
        if(!isset($_SESSION['login'])){
            //header("Location:".base_url."Carrito/index");
            echo '<script>window.location="'.base_url.'Carrito/index"</script>';
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

    //Mostrar slider
    public static function getSlider(){
        require_once 'models/slider.php';
        $slider = new Slider();
        $result = $slider->getAll();
        return $result;
    }

    //Mostrar todos los productos
    public static function showProducts(){
        require_once 'models/producto.php';
        $producto = new Producto();
        $result = $producto->getAll();
        return $result;
    }

    //mostrar todos los pedidos por ID
    public static function getPedidoForId($usuario_id){
        require_once 'models/pedido.php';
        $pedido = new Pedido();
        $pedido->setUsuario_id($usuario_id);
        $result = $pedido->getPedidos();
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

    //Quitar tildes a un string
    public static function quitar_tilde($string){
        //Reemplazamos la A y a
		$string = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $string
            );
     
            //Reemplazamos la E y e
            $string = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $string );
     
            //Reemplazamos la I y i
            $string = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $string );
     
            //Reemplazamos la O y o
            $string = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $string );
     
            //Reemplazamos la U y u
            $string = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $string );
     
            //Reemplazamos la N, n, C y c
            $string = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $string
            );
        return $string;
    }
}

?>