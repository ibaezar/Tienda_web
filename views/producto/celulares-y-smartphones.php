<div class="row">
    <div class="col">
    </div>
    <div class="col-12 col-xl-10">
        <section>
            <h2 class="title">Celulares y Smartphones</h2>
            <div class="row">
            <?php $productos = Utils::showProductsForCategory($categoria->id) ?>
                <?php while($produc = $productos->fetch_object()): ?>
                    <?php if($produc->stock > 0): ?>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                        <article>
                            <div class="producto">
                                <div class="producto-imagen">
                                    <a href="<?=base_url?>/Producto/detalle&id=<?=$produc->id?>">
                                        <img src="<?=base_url?>uploads/productos/<?=$produc->ruta_imagen?>/<?=$produc->imagen?>">
                                    </a>
                                </div>
                                <div class="producto-titulo">
                                    <h5><?=$produc->nombre?></h5>
                                </div>
                                <div class="producto-detalle">
                                    <span><strong>$ <?=number_format($produc->precio, 0, ",", ".")?></strong></span>
                                    <p>Internet: $<?=number_format($produc->precio, 0, ",", ".")?></p>
                                    <p class="antes">Normal: $<?=number_format(($produc->precio*2), 0, ',', '.')?></p>
                                </div>
                                <a href="<?=base_url?>Carrito/add&id=<?=$produc->id?>" class="btn btn-success">Añadir al carrito</a>
                            </div>
                        </article>
                    </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
    <div class="col">
    </div>
</div>