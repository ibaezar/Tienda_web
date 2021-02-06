<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="form">
        <?php if(isset($_SESSION['editar_categoria']) && $_SESSION['editar_categoria'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">categoria editada exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['editar_categoria']) && $_SESSION['editar_categoria'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar la categoria</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_categoria') ?>

        <h1>Página para editar categoria</h1>

        <form action="<?=base_url?>Categoria/editar" method="POST">

            <label for="nombre">Nombre de la categoria</label>
            <input type="text" name="nombre" value="<?=$nombre_categoria?>">

            <input type="submit" Value="Editar" class="btn btn-info">
        </form>
    </div>
</div>