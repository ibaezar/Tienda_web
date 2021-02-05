<div class="form">

    <?php if(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'correcto'):?>
        <div style="background-color: green; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Usuario editado correctamente</p>
        </div>
    <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'incorrecto'):?>
        <div style="background-color: red; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar los datos</p>
        </div>
    <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'error_imagen'):?>
        <div style="background-color: red; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error de imagen</p>
        </div>
    <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'error_eliminar_imagen'):?>
        <div style="background-color: red; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar la imagen anterior</p>
        </div>
    <?php elseif(isset($_SESSION['editar_usuario']) && $_SESSION['editar_usuario'] == 'error_directorio'):?>
        <div style="background-color: red; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar directorio anterior</p>
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
        <input type="submit" value="Editar" class="btn-primary">
    </form>
</div>