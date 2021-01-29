<div class="row">
    <div class="col"></div>
    <div class="col-5">
    <?php
    if(!isset($_SESSION['carrito'])){
        header("Location:".base_url."Carrito/index");
    }
    ?>
        <?php if(isset($_SESSION['login'])):?>

        <h3>Resumen de tu compra</h3>
        <hr>
        <table>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            <?php $carrito = $_SESSION['carrito'] ?>
            <?php 
            foreach($carrito as $indice => $elemento):
            $producto = $elemento['producto'];
            ?>
            <tr>
                <td>
                    <img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="50px">
                    <?=$producto->nombre?>
                </td>
                <td><?=$elemento['unidades']?></td>
                <td>$<?=number_format($producto->precio, 0, ',', '.')?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <hr>
        <div>
            <?php 
            $subtotal = Utils::stateCart();
            $envio = 0;
            ?>
            <p>Subtotal: <strong>$<?=number_format($subtotal['total'], 0, ",", ".")?></strong></p>
            <p>Envío: <strong>$<?=number_format($envio, 0, ",", ".")?></strong></p>
            <p>Total: <strong>$<?=number_format($subtotal['total']+$envio, 0, ",", ".")?></strong></p>
        </div>
        <hr>
        <?php else:?>
        <h2>Debes estár registrado para poder continuar con tu pedido</h2>
        <?php endif; ?>
    </div>

    <div class="col-5">
        <div class="form form-2">
            <?php
        if(!isset($_SESSION['carrito'])){
            header("Location:".base_url."Carrito/index");
        }
    ?>
            <?php if(isset($_SESSION['login'])):?>

            <h2>Hacer pedido</h2>
            <h3>Informacion del despacho</h3>

            <form action="<?=base_url?>Pedido/add" method="POST">

                <?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'incorrecto'):?>
                <div style="background-color: red; height: 50px; margin-bottom: 10px">
                    <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al realizar el
                        pedido</p>
                </div>
                <?php endif;?>

                <p>DIRECCIÓN</p>
                <input type="text" name="ciudad" placeholder="Ciudad">
                <input type="text" name="comuna" placeholder="Comuna">
                <input type="text" name="direccion" placeholder="Calle y numero">
                <input type="text" name="depto" placeholder="Depto, Oficina, etc. (Opcional)">
                <textarea name="observacion"
                    placeholder="Cualquier comentario que sea de utilidad para el despacho (Opcional)"></textarea>
                <input type="submit" class="btn-success" value="Finalizar pedido">
                <?php Utils::eliminarSesion('pedido') ?>
            </form>
            <?php else:?>
            <h2>Debes estár registrado para poder continuar con tu pedido</h2>
            <?php endif; ?>
        </div>
    </div>
    <div class="col"></div>