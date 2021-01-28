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

            if($save){
                $_SESSION['pedido'] = 'correcto';
                Utils::eliminarSesion('carrito');
            }else{
                $_SESSION['pedido'] = 'incorrecto';
            }
        }else{
            $_SESSION['pedido'] = 'incorrecto';
        }

        header("Location:".base_url."Pedido/hacer");
    }
}

?>