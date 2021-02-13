<div class="row">
    <?=isset($_SESSION['admin']) ? require_once 'views/administrador/aside.php' : null ?>
    
    <div class="form">
        <?php if(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'correcto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Usuario editado exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'incorrecto'):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al editar los datos de usuario.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'error_imagen'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al subir la imagen.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'error_eliminar_imagen'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al editar la imagen anterior.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'error_directorio'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al editar el directorio anterior.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_usuario') ?>

        <h3>Editar mis datos</h3>
        <p>Rellene los datos del formulario para editarlos</p>
        <form action="<?=base_url?>Usuario/update" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Introduzca su nombre" value="<?=$datos_usuario->nombre?>">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Introduzca sus apellidos" value="<?=$datos_usuario->apellidos?>">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen" accept="image/*">
            <input type="submit" value="Editar" class="btn btn-info">
        </form>
    </div>
</div>