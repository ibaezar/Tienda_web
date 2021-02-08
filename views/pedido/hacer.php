<div class="row">
    <div class="col"></div>
    <div class="col-5">

        <?=!isset($_SESSION['carrito']) ?  header("Location:".base_url."Carrito/index") : null ?>

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
        <div class="card" style="margin: auto; margin-top: 30px;">
            <?=!isset($_SESSION['carrito']) ? header("Location:".base_url."Carrito/index") : null ?>
            <?php if(isset($_SESSION['login'])):?>

                <?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'incorrecto'):?>
                    <div style="background-color: red; height: 50px; margin-bottom: 10px">
                        <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al realizar el pedido</p>
                    </div>
                <?php endif;?>

                <div class="card-header">
                    <h2>Hacer pedido</h2>
                    <h3>Informacion del despacho</h3>
                </div>
                
                <div class="card-body">
                    <form action="<?=base_url?>Pedido/add" method="POST" class="needs-validation" novalidate>
                        <div class="form-group">
                            <p>DIRECCIÓN</p>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="ciudad">Ciudad</label>
                                <input type="text" class="form-control" name="ciudad" placeholder="Ciudad" required>
                            </div>
                            <div class="col-md-6">
                                <label for="comuna">Comuna</label>
                                <input type="text" class="form-control" name="comuna" placeholder="Comuna" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" name="direccion" placeholder="Calle y numero" required>
                            </div>
                            <div class="col-md-6">
                                <label for="depto">Depto, oficina, etc.</label>
                                <input type="text" class="form-control" name="depto" placeholder="Depto, Oficina, etc. (Opcional)">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="observacion">Comentario...</label>
                            <textarea name="observacion" class="form-control" placeholder="Cualquier comentario que sea de utilidad para el despacho (Opcional)"></textarea>
                        </div>
                        <hr>
                        <input type="submit" class="btn btn-primary" value="Finalizar pedido">
                        <?php Utils::eliminarSesion('pedido') ?>
                    </form>
                </div>
            <?php else:?>
                <h2>Debes estár registrado para poder continuar con tu pedido</h2>
            <?php endif; ?>
        </div>
    </div>
    <div class="col"></div>
</div>