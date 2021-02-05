<?php

require_once 'models/pedido.php';

class PedidoController{

    public function hacer(){
        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        if(isset($_SESSION['login']) && isset($_POST)){
            $usuario_id = (int)$_SESSION['login']->id;

            //Obtener el valor total del carrito
            $valor = Utils::stateCart();
            $valor = $valor['total'];

            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedido->setCiudad($_POST['ciudad']);
            $pedido->setComuna($_POST['comuna']);
            $pedido->setDireccion($_POST['direccion']);
            $pedido->setDepto($_POST['depto']);
            $pedido->setObservacion($_POST['observacion']);
            $pedido->setValor($valor);

            $save = $pedido->save();
            $save_linea = $pedido->save_linea();

            if($save && $save_linea){
                $_SESSION['pedido'] = 'correcto';
                Utils::eliminarSesion('carrito');
                //Llamamos a la funcion ver detalle del ultimo pedido
                //header("Location:".base_url."Pedido/getDetail");
                echo '<script>window.location="'.base_url.'Pedido/getDetail"</script>';
            }else{
                $_SESSION['pedido'] = 'incorrecto';
                //header("Location:".base_url."Pedido/hacer");
                echo '<script>window.location="'.base_url.'Pedido/hacer"</script>';
            }
        }else{
            $_SESSION['pedido'] = 'incorrecto';
            //header("Location:".base_url."Pedido/hacer");
            echo '<script>window.location="'.base_url.'Pedido/hacer"</script>';
        }
    }

    public function mis_pedidos(){
        Utils::isLoged();
        $usuario_id = $_SESSION['login']->id;
        $pedidos = new Pedido();
        $pedidos->setUsuario_id($usuario_id);
        $mis_pedidos = $pedidos->getPedidos();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isLoged();

        if(isset($_GET['id'])){
            $usuario_id = $_SESSION['login']->id;
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($usuario_id);
            $pedido->setId($id);
            $detalle = $pedido->getDetalleById();
            $productos = $pedido->getPedidosById();

            require_once 'views/pedido/detalle.php';
        }else{
            //header("Location:".base_url);
            echo '<script>window.location="'.base_url.'"</script>';
        }
    }

    public function getDetail(){
        $pedido = new Pedido();

        //id usuario logeado
        $usuario_id = $_SESSION['login']->id;
        //Obtener el Id del pedido recien creado
        $pedido_id = $pedido->getLastIdPedido()->producto_id;

        $pedido->setUsuario_id($usuario_id);
        $pedido->setId($pedido_id);
        $detalle = $pedido->getDetalleById();
        $productos = $pedido->getPedidosById();

        require_once 'views/pedido/detalle.php';
    }
}

?>