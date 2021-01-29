<div class="row">
    <div class="col">
    </div>
    <div class="col-10">
        <section>
            <h2 class="title">Productos destacados</h2>
            <?php $productos = Utils::showProducts() ?>
                <?php while($produc = $productos->fetch_object()): ?>
                    <?php if($produc->stock > 0): ?>
                        <article>
                            <div>
                                <a href="<?=base_url?>/Producto/detalle&id=<?=$produc->id?>">
                                    <img src="<?=base_url?>uploads/productos/<?=$produc->ruta_imagen?>/<?=$produc->imagen?>">
                                </a>
                                <h4><?=$produc->nombre?></h4>
                                <span><strong>$ <?=$precio = number_format($produc->precio, 0, ",", ".")?></strong></span>
                                <p>Internet: <?=$precio = number_format($produc->precio, 0, ",", ".")?></p>
                                <p>Normal: <?=($produc->precio*2)?></p>
                                <div class="button btn-success"><a href="<?=base_url?>Carrito/add&id=<?=$produc->id?>">Añadir al carrito</a></div>
                            </div>
                        </article>
                    <?php endif; ?>
                <?php endwhile; ?>
        </section>
    </div>
    <div class="col">
    </div>
</div>