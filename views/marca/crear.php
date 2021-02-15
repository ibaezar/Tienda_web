<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card" style="margin: auto; margin-top: 30px;">
        <?php if(isset($_SESSION['crear_marca']) && $_SESSION['crear_marca'] == 'correcto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Marca creada exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['crear_marca']) && $_SESSION['crear_marca'] == 'incorrecto'):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al crear la marca, intentelo nuevamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('crear_marca') ?>

        <div class="card-header">
            <h3>Página para crear marcas</h3>
        </div>
        
        <div class="card-body">
            <form action="<?=base_url?>Marca/save" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la marca" required>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen" required>
                        <label class="custom-file-label" data-browse="Elegir" for="imagen">Imagen</label>
                        <div class="invalid-feedback">
                            Por favor, seleccione una imagen.
                        </div>
                    </div>
                </div>
                <input type="submit" value="Crear" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>