<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card" style="margin: auto; margin-top: 30px;">
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