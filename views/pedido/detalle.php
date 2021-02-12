<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'correcto'):?>
    <div class="row">
        <div class="col"></div>
        <div class="col-10">
        <div style="background-color: green; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Pedido realizado exitosamente</p>
        </div>
        </div>
    <div class="col"></div>
    </div>
<?php endif;?>

<div class="row">
    <div class="col"></div>
    <div class="col-5">
        <?php if(isset($detalle)): ?>
        <h2>Detalle del pedido</h2>
        <hr>
        <?php while($detail = $detalle->fetch_object()): ?>
            <h5>Direccion de envío</h5>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Ciudad:</th>
                        <td><?=$detail->ciudad?></td>
                    </tr>
                    <tr>
                        <th>Comuna:</th>
                        <td><?=$detail->comuna?></td>
                    </tr>
                    <tr>
                        <th>Dirección:</th>
                        <td><?=$detail->direccion?></td>
                    </tr>
                    <tr>
                        <th>Depto:</th>
                        <td><?=$detail->depto?></td>
                    </tr>
                    <tr>
                        <th>Observación:</th>
                        <td><?=$detail->observacion?></td>
                    </tr>
                    <tr>
                        <th>Estado:</th>
                        <td><?=$detail->estado?></td>
                    </tr>
                    <tr>
                        <th>Fecha del pedido:</th>
                        <td><?=$detail->fecha?></td>
                    </tr>
                    <tr>
                        <th>Hora del pedido:</th>
                        <td><?=$detail->hora?> Hrs</td>
                    </tr>
                    <tr>
                        <th>Total pagado:</th>
                        <td>$<?=number_format($detail->valor, 0, ',', '.')?></td>
                    </tr>
                </tbody>
            </table>
        <?php endwhile; ?>

        <?php else: ?>
            <h2>No hay pedidos por mostrar</h2>
        <?php endif; ?>
    </div>
    <div class="col-5">
    <?php if(isset($detalle)): ?>
        <h2>Detalle de los productos</h2>
        <hr>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">N° pedido</th>
                    <th scope="col">ID producto</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <?php while($producto = $productos->fetch_object()): ?>
            <tbody>
                <tr>
                    <th scope="row"><?=$producto->id_pedido?></th>
                    <td><?=$producto->id_producto?></td>
                    <td>
                        <img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="50px">
                        <?=$producto->producto?>
                    </td>
                    <td>$<?=number_format($producto->precio, 0, ',', '.')?></td>
                    <td><?=$producto->cantidad?></td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
        <?php Utils::eliminarSesion('pedido') ?>
        <?php else: ?>
            <h2>No hay pedidos por mostrar</h2>
        <?php endif; ?>
    </div>
    <div class="col"></div>
</div>