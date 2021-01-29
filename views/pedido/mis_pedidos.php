<div class="row">
    <div class="col"></div>
    <div class="col-10">
        <h3 style="text-align: center">Listado de mis pedidos</h3>
        <hr>
        <table>
            <tr>
                <th>N° pedido</th>
                <th>Id producto</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Detalle</th>
            </tr>
            <?php while($pedido = $mis_pedidos->fetch_object()): ?>
            <tr>
                <td><?=$pedido->id_pedido?></td>
                <td><?=$pedido->id_producto?></td>
                <td>
                    <img src="<?=base_url."uploads/productos/".$pedido->ruta_imagen."/".$pedido->imagen?>" width="50px">
                    <?=$pedido->producto?>
                </td>
                <td><?=$pedido->precio?></td>
                <td><?=$pedido->cantidad?></td>
                <td><a href="<?=base_url?>Pedido/detalle&id=<?=$pedido->id_pedido?>">Ver detalle</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <div class="col"></div>
</div>