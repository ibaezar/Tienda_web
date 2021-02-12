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
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N° pedido</th>
                        <th scope="col">Id producto</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Detalle</th>
                    </tr>
                </thead>
                <?php while($pedido = $pedidos->fetch_object()): ?>
                <tbody>
                    <tr>
                        <th scope="row"><?=$pedido->id_pedido?></th>
                        <td><?=$pedido->id_producto?></td>
                        <td>
                            <img src="<?=base_url."uploads/productos/".$pedido->ruta_imagen."/".$pedido->imagen?>" width="50px">
                            <?=$pedido->producto?>
                        </td>
                        <td>$<?=number_format($pedido->precio, 0, ',', '.')?></td>
                        <td><?=$pedido->cantidad?></td>
                        <td><a href="<?=base_url?>Pedido/detalle&id=<?=$pedido->id_pedido?>" class="btn btn-warning">Ver detalle</a></td>
                    </tr>
                </tbody>
                <?php endwhile; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="col"></div>
</div>