<?php
ob_start();

require_once 'models/producto.php';

class CarritoController{

    public function index(){
        if(isset($_SESSION['carrito'])){
            $carrito = $_SESSION['carrito'];
        }
        require_once 'views/carrito/index.php';
    }

    public function add(){
        if(isset($_GET['id'])){
            $producto_id = $_GET['id'];
        }else{
            //header("Location:".base_url);
            echo '<script>window.location="'.base_url.'"</script>';
        }

        if(isset($_SESSION['carrito'])){
            $counter = 0;
            foreach($_SESSION['carrito'] as $indice => $elemento){
                if($elemento['id_producto'] == $producto_id){
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        if(!isset($counter) || $counter == 0){
            //Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            if(is_object($producto)){
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        //header("Location:".base_url."Carrito/index");
        echo '<script>window.location="'.base_url.'Carrito/index"</script>';
    }

    public function remove(){
        if(isset($_GET['id'])){
            $indice = $_GET['id'];
            unset($_SESSION['carrito'][$indice]);
            //header('Location:'.base_url.'Carrito/index');
            echo '<script>window.location="'.base_url.'Carrito/index"</script>';
        }
    }

    public function delete(){
        unset($_SESSION['carrito']);
        //header("Location:".base_url."Carrito/index");
        echo '<script>window.location="'.base_url.'Carrito/index"</script>';
    }

    public function up(){
        if(isset($_GET['index']) && isset($_SESSION['carrito'])){
            $indice = $_GET['index'];
            $_SESSION['carrito'][$indice]['unidades']++;
            //header("Location:".base_url."Carrito/index");
            echo '<script>window.location="'.base_url.'Carrito/index"</script>';
        }else{
            //header("Location:".base_url."Carrito/index");
            echo '<script>window.location="'.base_url.'Carrito/index"</script>';
        }
    }

    public function down(){
        if(isset($_GET['index']) && isset($_SESSION['carrito'])){
            $indice = $_GET['index'];
            $_SESSION['carrito'][$indice]['unidades']--;

            if($_SESSION['carrito'][$indice]['unidades'] == 0){
                unset($_SESSION['carrito'][$indice]);
            }

            //header("Location:".base_url."Carrito/index");
            echo '<script>window.location="'.base_url.'Carrito/index"</script>';
        }else{
            //header("Location:".base_url."Carrito/index");
            echo '<script>window.location="'.base_url.'Carrito/index"</script>';
        }
    }
}

ob_end_flush();
?>