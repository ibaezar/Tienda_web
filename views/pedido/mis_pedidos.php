<div class="row" style="margin-bottom: 20px">
    <div class="col"></div>
    <div class="col-12 col-xl-10">
        <h3 style="text-align: center">Listado de mis pedidos</h3>
        <hr>
        <?php $pedidos = Utils::getPedidoForId($usuario_id) ?>
        <?php if(!$pedidos->fetch_object()): ?>
            <div>
                <img src="<?=base_url?>assets/img/carita-triste.png" width="150px" style="display:block; margin:auto;">
                <p style="text-align: center">No tienes pedidos</p>
                <a href="<?=base_url?>" class="btn btn-primary" style="display:block; margin:auto; width:220px;">Revisa nuestros productos</a>
            </div>
        <?php else:?>
            <?php while($pedido = $pedidos->fetch_object()): ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p><strong>Número de boleta:</strong> <?=$pedido->id_pedido?></p>
                            <span><img src="<?=base_url."uploads/productos/".$pedido->ruta_imagen."/".$pedido->imagen?>" width="50px"></span>
                            <strong><?=$pedido->producto?></strong>
                            <p><strong>Precio:</strong> $<?=number_format($pedido->precio,0, ',', '.')?></p>
                            <p><strong>Id producto:</strong> <?=$pedido->id_producto?></p>
                            <p><strong>Unidades:</strong> <?=$pedido->cantidad?></p>
                        </div>
                        <div class="col-12 col-md-6">
                            <p><strong>Fecha de compra:</strong> <?=$pedido->fecha_pedido?></p>
                            <p><strong>Total pagado:</strong> $<?=number_format($pedido->total_pagado,0, ',', '.')?></p>
                            <span><a href="<?=base_url?>Pedido/detalle&id=<?=$pedido->id_pedido?>" class="btn btn-warning">Ver detalle</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div class="col"></div>
</div>