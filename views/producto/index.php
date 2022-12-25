<div class="row">
    <div class="col">
    </div>
    <div class="col-12 col-xl-10">
        <section>
            <h2 class="title">Productos destacados</h2>
            <div class="row">
            <?php $productos = Utils::showProducts() ?>
            <?php if(strlen($productos->fetch_object()) > 0): ?>
                <?php while($produc = $productos->fetch_object()): ?>
                    <?php if($produc->stock > 0 && $produc->categoria_id != 3): ?>
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
                                    <span><strong>$ <?=$precio = number_format($produc->precio, 0, ",", ".")?></strong></span>
                                    <p>Internet: $<?=$precio = number_format($produc->precio, 0, ",", ".")?></p>
                                    <p class="antes">Normal: $<?=($produc->precio*2)?></p>
                                </div>
                                <a href="<?=base_url?>Carrito/add&id=<?=$produc->id?>" class="btn btn-success"><span class="icon-cart"></span> Añadir al carrito</a>
                            </div>
                        </article>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Ops...!</h4>
                    <p>No existen productos creados en la base de datos.</p>
                    <p>Te invitamos a acceder con tu cuenta de administrador para poder crear productos.</p>
                    <hr>
                    <p class="mb-0"><strong>Nota:</strong> Para poder crear productos, primero debes tener creado al menos una categoría.</p>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </section>
    </div>
    <div class="col">
    </div>
</div>