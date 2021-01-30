<div class="row">
    <div class="col"></div>
    <div class="col-10" style="margin: 20px 0px">
        <h3 style="text-align: center">Marcas con las que trabajamos</h3>
        <hr>
        <div class="owl-carousel owl-theme carrusel2">
            <?php $marcas = Utils::showMarca() ?>
            <?php while($marca = $marcas->fetch_object()): ?>
            <div class="item"><img src="<?=base_url?>uploads/marcas/<?=$marca->ruta_imagen?>/<?=$marca->imagen?>" width="50%"></div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="col"></div>
</div>