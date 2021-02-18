        
        <!--Pie de página-->
        <footer id="footer">
            <div class="row">
                <div class="col-12 col-sm-6 col-md widget widget-1">
                    <h3>Accesos</h3>
                    <nav>
                        <ul>
                        <li><a href="<?=base_url?>">Inicio</a></li>
                            <?php $categorias = Utils::showCategory() ?>
                                <?php while($cat = $categorias->fetch_object()): ?>
                                    <li><a href="<?=base_url?>Producto/<?=str_replace(' ', '_',(Utils::quitar_tilde($cat->nombre)))?>"><?=$cat->nombre?></a></li>
                                <?php endwhile; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-sm-6 col-md-5 widget widget-3">
                    <h3>Contactanos</h3>
                    <p>
                        Ubícanos.<br />
                        Av. Andrés Bello 2425, Providencia, Región Metropolitana.<br />
                        Teléfono: +56940553145.<br />
                        Email: ventas@ventas.cl.
                    </p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.201563231842!2d-70.6085787847231!3d-33.417989003233174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662cf69d4854951%3A0x9a87ef2fefaad0df!2sCostanera%20Center!5e0!3m2!1ses-419!2scl!4v1610494400816!5m2!1ses-419!2scl"
                        width="200" height="150" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
                <div class="col-12 col-sm-12 col-md widget widget-2">
                    <h3>Tienda Web</h3>
                    <p>
                        Distribuidor mayorista y detalle de accesorios, repuestos y servicio técnico para Celulares
                        marcas como Iphone, Samsung, Huawei, Xiaomi, LG Mobile, Motorola, Nokia.
                    </p>
                    <img src="<?=base_url?>assets/img/pago_webpay.png">
                </div>
            </div>
            <div class="row">
                <div class="col registrado">
                    <a href="https://www.ibaezar.com/" target="_blank">Desarrollado por <strong>Izhar Baeza</strong> &copy; <?=date("Y")?></a>
                </div>
            </div>
        </footer>
    </div>
    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="<?=base_url?>assets/owl-carousel/owl.carousel.min.js?v=<?php echo(rand()); ?>"></script>
    <script type="text/javascript" src="<?=base_url?>assets/js/scripts/scripts.js?v=<?php echo(rand()); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
</body>

</html>