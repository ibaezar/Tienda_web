<div class="row">
    <div class="col"></div>
    <div class="col-12 col-xl-10">
        <div class="row">
            <?php if(isset($_SESSION['carrito']) && $_SESSION['carrito'] != null): ?>
                <div class="col-12 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <!--Encabezado de la lista de productos-->
                            <?php $cant_productos = Utils::stateCart()['count'] ?>
                            <h4><span class="icon-cart"></span> Tu carro <strong>(<?=$cant_productos?> Productos)</strong></h4>
                            <hr>
                            <!--Cuerpo de la lista de productos-->
                            <?php 
                                foreach($carrito as $indice => $elemento):
                                $producto = $elemento['producto'];
                            ?>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <p><strong><?=$producto->nombre?></strong></p>
                                        <span>
                                            <img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="100px">
                                            
                                            <span>
                                                <a class="btn btn-danger" href="<?=base_url?>Carrito/down&index=<?=$indice?>">-</a>
                                                <strong class="unidades"><?=$elemento['unidades']?></strong>
                                                <a class="btn btn-warning" href="<?=base_url?>Carrito/up&index=<?=$indice?>">+</a>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <p><strong>Precio:</strong> $<?=number_format($producto->precio, 0, ',', '.')?></p>
                                        <span><a href="<?=base_url?>Carrito/remove&id=<?=$indice?>" class="btn btn-danger"><span class="icon-bin2"></span> Eliminar</a></span>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <?php $total = Utils::stateCart()['total']?>

                <div class="col-12 col-md-5">
                    <div class="card card-carrito">
                        <div class="card-body">
                            <h4><stron>Total</strong></h4>
                            <hr>
                            <p>Cantidad <strong><?=$cant_productos?></strong></p>
                            <p>Subtotal <strong>$<?=number_format($total, 0, ',', '.')?></strong></p>
                            <p>Valor total <strong>$<?=number_format($total, 0, ',', '.')?></strong></p>


                            <a href="<?=base_url?>Pedido/hacer" class="btn btn-success">Continuar con la compra</a>
                            <a href="<?=base_url?>" class="btn btn-primary">Seguir agregando productos</a>
                            <a href="<?=base_url?>Carrito/delete" class="btn btn-danger"><span class="icon-bin2"></span> Vaciar carrito</a>
                            <hr>
                            <div class="pago">
                                <p>Medios de pago disponibles</p>
                                <img src="<?=base_url?>assets/img/medios.jpg">
                            </div>
                            <hr>
                            <p>
                                Puedes cambiar tus productos hasta 30 días después de la fecha de compra.
                            </p>
                        </div>
                    </div>
                </div>
            <?php else:?>
                <div class="col"></div>
                <div class="col-12 col-xl-10">
                    <h3 style="text-align: center">Carrito de compras</h3>
                    <hr>
                    <img src="<?=base_url?>assets/img/carita-triste.png" width="150px" style="display:block; margin:auto;">
                    <p style="text-align: center">No tienes productos en el carrito</p>
                    <a href="<?=base_url?>" class="btn btn-primary" style="display:block; margin:auto; width:220px; margin-bottom: 20px">Revisa nuestros productos</a>
                </div>
                <div class="col"></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col"></div>
</div>