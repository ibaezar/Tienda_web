<div class="row">
    <div class="col"></div>
    <?php if(isset($product)):?>
        <div class="col-5">
            <img src="<?=base_url?>uploads/productos/<?=$product->ruta_imagen?>/<?=$product->imagen?>" width="100%">
        </div>
        <div class="col-5">
            <span>Apple</span>
            <h2><?=$product->nombre?></h2>
            <p><?=$product->descripcion?></p>
            <span><strong>$<?=$product->precio?></strong></span>
            <hr>
            <p><?=$product->detalle?></p>
        </div>
    <?php endif; ?>
    <div class="col"></div>
</div>
<div class="row">
    <div class="col"></div>
    <div class="col-10">
        <section>
            <h2 class="title">También podría interesarte</h2>
            <div class="owl-carousel owl-theme carrusel-productos">
                <?php $productos = Utils::showProductsForCategory((int)$product->categoria_id)?>
                <?php while($producto = $productos->fetch_object()): ?>
                    <?php if($producto->id != $product->id): ?>
                        <div class="item">
                            <article>
                                <div>
                                    <a href="<?=base_url?>/Producto/detalle&id=<?=$producto->id?>">
                                        <img src="<?=base_url?>uploads/productos/<?=$producto->ruta_imagen?>/<?=$producto->imagen?>" width="100%">
                                    </a>
                                    <h4><?=$producto->nombre?></h4>
                                    <span><strong>$ <?=$producto->precio?></strong></span>
                                    <p>Internet: <?=$producto->precio?></p>
                                    <p>Normal: <?=($producto->precio*2)?></p>
                                    <div class="button btn-success"><a href="#">Añadir al carrito</a></div>
                                </div>
                            </article>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
    <div class="col"></div>
</div>