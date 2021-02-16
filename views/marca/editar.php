<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card" style="margin: auto; margin-top: 30px;">
        <?php if(isset($_SESSION['editar_marca']) && $_SESSION['editar_marca'] == 'correcto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Marca editada exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_marca']) && $_SESSION['editar_marca'] == 'incorrecto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Error al editar la marca.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_marca') ?>

        <div class="card-header">
            <h3>Página para editar marcas</h3>
        </div>
        
        <div class="card-body">
            <form action="<?=base_url?>Marca/editar" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre de la marca</label>
                    <input type="text" class="form-control" name="nombre" value="<?=$nombre_marca?>" required>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="imagen">
                        <label for="imagen" class="custom-file-label" >Seleccione Imagen (Opcional)</label>
                        <div class="invalid-feedback">
                            Por favor, Seleccione una imagen correcta.
                        </div>
                    </div>
                </div>
                <input type="submit" Value="Editar" class="btn btn-info">
            </form>
        </div>
    </div>
</div>