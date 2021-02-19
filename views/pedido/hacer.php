<div class="row">
    <div class="col"></div>

    <?=!isset($_SESSION['carrito']) ?  header("Location:".base_url."Carrito/index") : null ?>

    <?php if(!isset($_SESSION['login'])):?>
        <div class="col-12 col-xl-10">

            <h1 style="text-align: center; padding: 5px;">Debes estár registrado para poder continuar con tu compra</h1>
            <hr>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Iniciar sesión</h5>
                            <p class="card-text">
                                Ingresa tus datos para continuar con tu compra.
                            </p>
                            <button type="button" class="btn-login btn btn-success">Continuar</button>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Registrarse</h5>
                            <p class="card-text">
                                Ingresa tus datos para continuar con tu compra.
                            </p>
                            <a href="<?=base_url?>Usuario/register" class="btn btn-primary">Continuar</a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['login'])):?>
        <div class="col-12 col-md-6">

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
        </div>

        <div class="col-12 col-md-5">
            <div class="card" style="margin: 30px 0px;">
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
            </div>
        </div>
    <?php endif; ?>
    <div class="col"></div>
</div>