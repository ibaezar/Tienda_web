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
            <h3>Ingrese los datos solicitados</h3>
            <select name="marca">
                <?php $marcas = Utils::showMarca() ?>
                    <?php while($marca = $marcas->fetch_object()): ?>
                        <option value="<?=$marca->id?>"><?=$marca->nombre?></option>
                    <?php endwhile; ?>
            </select>
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen">
            <input type="submit" Value="Editar" class="btn-primary">
        </form>
    </div>
</div>