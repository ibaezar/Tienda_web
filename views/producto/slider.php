<div class="row">
    <div class="col"></div>
    <div class="col-12 col-xl-10 col-slider">
        <?php $slider = Utils::getSlider() ?>
        <div class="slider">
            <div id="slider-principal" class="owl-carousel owl-theme">
                <?php while($imagen = $slider->fetch_object()): ?>
                <div class="item"><img src="<?=base_url?>uploads/slider/<?=$imagen->imagen?>" width="100%"></div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>