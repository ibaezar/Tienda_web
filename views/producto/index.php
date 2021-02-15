<div class="row">
    <div class="col">
    </div>
    <div class="col-10">
        <section>
            <h2 class="title">Productos destacados</h2>
            <div class="row">
            <?php $productos = Utils::showProducts() ?>
                <?php while($produc = $productos->fetch_object()): ?>
                    <?php if($produc->stock > 0 && $produc->categoria_id != 3): ?>
                        <div class="col-md-3">
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
                                    <span><strong>$ <?=$precio = number_format($produc->precio, 0, ",", ".")?></strong></span>
                                    <p>Internet: $<?=$precio = number_format($produc->precio, 0, ",", ".")?></p>
                                    <p class="antes">Normal: $<?=($produc->precio*2)?></p>
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