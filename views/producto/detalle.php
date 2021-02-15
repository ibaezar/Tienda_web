<div class="row">
    <div class="col"></div>
    <?php if(isset($product) && (isset($marc))):?>
        <div class="col-5">
            <img src="<?=base_url?>uploads/productos/<?=$product->ruta_imagen?>/<?=$product->imagen?>" width="100%">
        </div>
        <div class="col-5">
            <span><?=$marc->nombre?></span>
            <h2><?=$product->nombre?></h2>
            <p><?=$product->descripcion?></p>
            <span><strong>$<?=$precio = number_format($product->precio, 0, ",", ".")?></strong></span>
            <hr>
            <p><?=$product->detalle?></p>
            <div class="btn btn-success"><a href="<?=base_url?>Carrito/add&id=<?=$product->id?>">Añadir al carrito</a></div>
        </div>
    <?php endif; ?>
    <div class="col"></div>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col-10">
        <section>
            <?php $productos = Utils::showProductsForCategory((int)$product->categoria_id)?>
            <h2 class="title">También podría interesarte</h2>

            <div class="row">
            <div class="slider-producto owl-theme">
                <?php while($producto = $productos->fetch_object()): ?>
                    <?php if($producto->id != $product->id): ?>
                        <div class="col-md-3 item">
                                <article>
                                    <div class="producto">
                                        <div class="producto-imagen">
                                            <a href="<?=base_url?>/Producto/detalle&id=<?=$producto->id?>">
                                                <img src="<?=base_url?>uploads/productos/<?=$producto->ruta_imagen?>/<?=$producto->imagen?>">
                                            </a>
                                        </div>
                                        <div class="producto-titulo">
                                            <h4><?=$producto->nombre?></h4>
                                        </div>
                                        <div class="producto-detalle">
                                            <span><strong>$ <?=$precio = number_format($producto->precio, 0, ",", ".")?></strong></span>
                                            <p>Internet: <?=$producto->precio?></p>
                                            <p class="antes">Normal: <?=($producto->precio*2)?></p>
                                        </div>
                                        <a href="<?=base_url?>Carrito/add&id=<?=$producto->id?>" class="btn btn-success">Añadir al carrito</a>
                                    </div>
                                </article>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
            </div>
        </section>
    </div>
    <div class="col"></div>
</div>