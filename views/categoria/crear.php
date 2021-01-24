<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="form">
        <?php if(isset($_SESSION['crear_categoria']) && $_SESSION['crear_categoria'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Categoria creada exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['crear_categoria']) && $_SESSION['crear_categoria'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al crear la categoria</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('crear_categoria') ?>

        <h1>Página para crear categorias</h1>

        <form action="<?=base_url?>Categoria/save" method="POST">
            <h3>Ingrese los datos solicitados</h3>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre de la categoria">
            <input type="submit" Value="Crear" class="btn-primary">
        </form>
    </div>
</div>