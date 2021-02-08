<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card" style="margin: auto; margin-top: 30px;">

        <?php if(isset($_SESSION['editar_slider']) && $_SESSION['editar_slider'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Slider editado exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['editar_slider']) && $_SESSION['editar_slider'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar el slider</p>
            </div>
        <?php elseif(isset($_SESSION['editar_slider']) && $_SESSION['editar_slider'] == 'error_imagenes'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error de imagenes</p>
            </div>
        <?php elseif(isset($_SESSION['editar_slider']) && $_SESSION['editar_slider'] == 'empty_imagenes'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Debes cargar imagenes</p>
            </div>
        <?php elseif(isset($_SESSION['editar_slider']) && $_SESSION['editar_slider'] == 'error_eliminar_imagenes'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar imagenes anteriores</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_slider') ?>

        <div class="card-header">
            <h3>Página para editar slider principal</h3>
        </div>

        <div class="card-body">
        <form action="<?=base_url?>Slider/update" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <input type="hidden" name="slider">
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="imagenes[]" accept="image/*" multiple required>
                    <label class="custom-file-label" for="imagenes" data-browse="Elegir">Elija la imagen...</label>
                    <div class="invalid-feedback">
                        Por favor, seleccione las imagenes que va a subir.
                    </div>
                </div>
            </div>
            <input type="submit" Value="Editar" class="btn btn-primary">
        </form>
        </div>
    </div>
</div>