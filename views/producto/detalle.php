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