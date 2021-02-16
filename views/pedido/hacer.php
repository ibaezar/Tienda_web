<div class="row">
    <div class="col"></div>
    <div class="col-5">

        <?=!isset($_SESSION['carrito']) ?  header("Location:".base_url."Carrito/index") : null ?>

        <?php if(isset($_SESSION['login'])):?>

            <table class="table table-striped" style="margin: 30px 0px;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <?php $carrito = $_SESSION['carrito'] ?>
                <?php 
                foreach($carrito as $indice => $elemento):
                $producto = $elemento['producto'];
                ?>
                <tbody>
                    <tr>
                        <th scope="row">
                            <img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="50px">
                            <?=$producto->nombre?>
                        </th>
                        <td><?=$elemento['unidades']?></td>
                        <td>$<?=number_format($producto->precio, 0, ',', '.')?></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

            <table class="table table-striped">
                <?php 
                $subtotal = Utils::stateCart();
                $envio = 0;
                ?>
                <tbody>
                    <tr>
                        <th scope="row">Subtotal:</th>
                        <td>$<?=number_format($subtotal['total'], 0, ",", ".")?></td>
                    </tr>
                    <tr>
                        <th scope="row">Envío:</th>
                        <td>$<?=number_format($envio, 0, ",", ".")?></td>
                    </tr>
                    <tr>
                        <th scope="row">Total:</th>
                        <td><strong>$<?=number_format($subtotal['total']+$envio, 0, ",", ".")?></strong></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <a href="<?=base_url?>Carrito/index" class="btn btn-warning">Volver al carrito de compras</a>
            <hr>
        <?php else:?>
            <h2>Debes estár registrado para poder continuar con tu pedido</h2>
        <?php endif; ?>
    </div>

    <div class="col-5">
        <div class="card" style="margin: auto; margin: 30px 0px;">
            <?=!isset($_SESSION['carrito']) ? header("Location:".base_url."Carrito/index") : null ?>
            <?php if(isset($_SESSION['login'])):?>

                <?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'incorrecto'):?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error al realizar el pedido.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php endif;?>

                <div class="card-header">
                    <h2>Hacer pedido</h2>
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