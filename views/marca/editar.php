<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="form">
        <?php if(isset($_SESSION['editar_marca']) && $_SESSION['editar_marca'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Marca editada exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['editar_marca']) && $_SESSION['editar_marca'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar la marca</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_marca') ?>

        <h1>Página para editar marcas</h1>

        <form action="<?=base_url?>Marca/editar" method="POST" enctype="multipart/form-data">

            <label for="nombre">Nombre de la marca</label>
            <input type="text" name="nombre" value="<?=$nombre_marca?>">

            <label for="imagen">Seleccione Imagen (Opcional)</label>
            <input type="file" name="imagen">

            <input type="submit" Value="Editar" class="btn btn-info">
        </form>
    </div>
</div>