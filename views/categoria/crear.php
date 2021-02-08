<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card" style="margin: auto; margin-top: 30px;">
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

        <div class="card-header">
            <h3>Página para crear categorias</h3>
        </div>

        <div class="card-body">
            <form action="<?=base_url?>Categoria/save" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <h6>Ingrese los datos solicitados</h6>
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la categoria" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese el nombre de la categoria.
                    </div>
                </div>
                <input type="submit" Value="Crear" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>