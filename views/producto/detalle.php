<div class="row">
    <div class="col"></div>
    <?php if(isset($product) && (isset($marc))):?>
        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
            <div class="producto-detalle-imagen">
                <img src="<?=base_url?>uploads/productos/<?=$product->ruta_imagen?>/<?=$product->imagen?>">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5">
            <div class="producto-detalle-detalle">
                <div class="marca">
                    <span><?=$marc->nombre?></span>
                </div>
                <div class="clearfix"></div>
                <div class="titulo">
                    <h2><?=$product->nombre?></h2>
                </div>
                <div class="descripcion">
                    <p><?=$product->descripcion?></p>
                </div>
                <hr>
                <div class="precio">
                    <span><strong>$<?=$precio = number_format($product->precio, 0, ",", ".")?></strong></span>
                </div>
                <hr>
                <div class="detalle">
                    <p><?=$product->detalle?></p>
                </div>
                <hr>
                <div class="pago">
                    <p>Medios de pago disponibles</p>
                    <img src="<?=base_url?>assets/img/medios.jpg">
                </div>
                <br>
                <div class="btn"><a href="<?=base_url?>Carrito/add&id=<?=$product->id?>">Añadir al carrito</a></div>
            </div>
        </div>
    <?php endif; ?>
    <div class="col"></div>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col-12 col-xl-10">
        <section>
            <?php $productos = Utils::showProductsForCategory((int)$product->categoria_id)?>
            <h2 class="title">También podría interesarte</h2>

            <div class="row">
                <div class="slider-producto owl-carousel owl-theme">
                    <?php while($producto = $productos->fetch_object()): ?>
                        <?php if($producto->id != $product->id): ?>
                            <div class="item">
                                <article>
                                    <div class="producto">
                                        <div class="producto-imagen">
                                            <a href="<?=base_url?>/Producto/detalle&id=<?=$producto->id?>">
                                                <img src="<?=base_url?>uploads/productos/<?=$producto->ruta_imagen?>/<?=$producto->imagen?>">
                                            </a>
                                        </div>
                                        <div class="producto-titulo">
                                            <h5><?=$producto->nombre?></h5>
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