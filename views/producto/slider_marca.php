<div class="row">
    <div class="col"></div>
    <div class="col-12 col-xl-10" style="margin: 20px 0px">
        <h3 class="titulo-slider-marca" style="text-align: center">Marcas con las que trabajamos</h3>
        <hr>
        <div class="slider">
            <div id="slider-marca" class="owl-carousel owl-theme">
                <?php $marcas = Utils::showMarca() ?>
                <?php if(strlen($marcas->fetch_object()) > 0): ?>
                    <?php while($marca = $marcas->fetch_object()): ?>
                        <?php if($marca->nombre != 'Otro'): ?>
                            <div class="item"><img class="img-marca" src="<?=base_url?>uploads/marcas/<?=$marca->ruta_imagen?>/<?=$marca->imagen?>"></div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="item"><img class="img-marca" src="<?=base_url?>assets/img/marca-without.png"></div>
                    <div class="item"><img class="img-marca" src="<?=base_url?>assets/img/marca-without.png"></div>
                    <div class="item"><img class="img-marca" src="<?=base_url?>assets/img/marca-without.png"></div>
                    <div class="item"><img class="img-marca" src="<?=base_url?>assets/img/marca-without.png"></div>
                    <div class="item"><img class="img-marca" src="<?=base_url?>assets/img/marca-without.png"></div>
                    <div class="item"><img class="img-marca" src="<?=base_url?>assets/img/marca-without.png"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>