<div class="row">
    <div class="col"></div>
    <div class="col-5">
        <?php if(isset($detalle)): ?>
        <h2>Detalle del pedido</h2>
        <hr>
        <?php while($detail = $detalle->fetch_object()): ?>
            <h5>Direccion de envío</h5>
            <p>Ciudad: <?=$detail->ciudad?></p>
            <p>Comuna: <?=$detail->comuna?></p>
            <p>Dirección: <?=$detail->direccion?></p>
            <p>Depto: <?=$detail->depto?></p>
            <p>Observación: <?=$detail->observacion?></p>
            <p>Estado: <?=$detail->estado?></p>
            <p>Fecha del pedido: <?=$detail->fecha?></p>
            <p>Hora del pedido: <?=$detail->hora?></p>
            <p>Total pagado: <?=$detail->valor?></p>
        <?php endwhile; ?>

        <?php else: ?>
            <h2>No hay pedidos por mostrar</h2>
        <?php endif; ?>
    </div>
    <div class="col-5">
    <?php if(isset($detalle)): ?>
        <h2>Detalle de los productos</h2>
        <hr>
        <table>
            <tr>
                <th>N° pedido</th>
                <th>Id producto</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            <?php while($producto = $productos->fetch_object()): ?>
            <tr>
                <td><?=$producto->id_pedido?></td>
                <td><?=$producto->id_producto?></td>
                <td>
                    <img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="50px">
                    <?=$producto->producto?>
                </td>
                <td><?=$producto->precio?></td>
                <td><?=$producto->cantidad?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        
        <?php else: ?>
            <h2>No hay pedidos por mostrar</h2>
        <?php endif; ?>
    </div>
    <div class="col"></div>
</div>