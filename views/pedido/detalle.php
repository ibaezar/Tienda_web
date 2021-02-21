<?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'correcto'):?>
    <div class="row">
        <div class="col-12 col-md-10"></div>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Pedido realizado exitosamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="col"></div>
    </div>
<?php endif;?>

<div class="row" style="margin-bottom: 20px">
    <div class="col"></div>
    <div class="col-12 col-md-6">
        <?php if(isset($detalle)): ?>
            <h2>Detalle de los productos</h2>
            <hr>
            <?php while($producto = $productos->fetch_object()): ?>
            <div class="card">
                <div class="card-body">
                    <p><strong>Número de boleta:</strong> <?=$producto->id_pedido?></p>
                    <span><img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="50px"></span>
                    <strong><?=$producto->producto?></strong>
                    <p><strong>Precio:</strong> $<?=number_format($producto->precio, 0, ',', '.')?></p>
                    <p><strong>Unidades:</strong> <?=$producto->cantidad?></p>
                </div>
            </div>
            <?php endwhile; ?>
            <?php Utils::eliminarSesion('pedido') ?>
        <?php else: ?>
            <h2>No hay pedidos por mostrar</h2>
        <?php endif; ?>
    </div>
    <div class="col-12 col-md-5">
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
    <div class="col"></div>
</div>