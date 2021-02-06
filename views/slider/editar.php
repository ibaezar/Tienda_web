<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="form">
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

        <h1>Página para editar slider principal</h1>

        <form action="<?=base_url?>Slider/update" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="slider">

            <label for="imagenes">Seleccione las Imagenes</label>
            <input type="file" name="imagenes[]" accept="image/*" multiple>

            <input type="submit" Value="Editar" class="btn-primary">
        </form>
    </div>
</div>