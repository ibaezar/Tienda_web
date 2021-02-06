<div class="row">
    <div class="col"></div>
    <div class="col-10">
        <h3 style="text-align: center">Listado de mis pedidos</h3>
        <hr>
        <?php $pedidos = Utils::getPedidoForId($usuario_id) ?>
        <?php if(!$pedidos): ?>
            <p>No tienes pedidos</p>
            <a href="<?=base_url?>" class="btn btn-primary">Revisa nuestros productos</a>
        <?php else:?>
            <table>
                <tr>
                    <th>N° pedido</th>
                    <th>Id producto</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Detalle</th>
                </tr>
                <?php while($pedido = $pedidos->fetch_object()): ?>
                    <tr>
                        <td><?=$pedido->id_pedido?></td>
                        <td><?=$pedido->id_producto?></td>
                        <td>
                            <img src="<?=base_url."uploads/productos/".$pedido->ruta_imagen."/".$pedido->imagen?>" width="50px">
                            <?=$pedido->producto?>
                        </td>
                        <td><?=$pedido->precio?></td>
                        <td><?=$pedido->cantidad?></td>
                        <td><a href="<?=base_url?>Pedido/detalle&id=<?=$pedido->id_pedido?>" class="btn btn-warning">Ver detalle</a></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="col"></div>
</div>