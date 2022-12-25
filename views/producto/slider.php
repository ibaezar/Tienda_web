<div class="row">
    <div class="col"></div>
    <div class="col-12 col-xl-10 col-slider">
        <?php $slider = Utils::getSlider() ?>
        <?php if(strlen($slider->fetch_object()) > 0): ?>
            <div class="slider">
                <div id="slider-principal" class="owl-carousel owl-theme">
                    <?php while($imagen = $slider->fetch_object()): ?>
                    <div class="item"><img src="<?=base_url?>uploads/slider/<?=$imagen->imagen?>" width="100%"></div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="slider">
                <div id="slider-principal" class="owl-carousel owl-theme">
                    <div class="item"><img src="<?=base_url?>assets/img/slider-without.png" width="100%"></div>
                    <div class="item"><img src="<?=base_url?>assets/img/slider-without.png" width="100%"></div>
                    <div class="item"><img src="<?=base_url?>assets/img/slider-without.png" width="100%"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="col"></div>
</div>