<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="form">
        <?php if(isset($_SESSION['crear_marca']) && $_SESSION['crear_marca'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Marca creada exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['crear_marca']) && $_SESSION['crear_marca'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al crear la marca</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('crear_marca') ?>

        <h1>Página para crear marcas</h1>

        <form action="<?=base_url?>Marca/save" method="POST" enctype="multipart/form-data">
            <h3>Ingrese los datos solicitados</h3>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre de la marca">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen">
            <input type="submit" Value="Crear" class="btn btn-primary">
        </form>
    </div>
</div>