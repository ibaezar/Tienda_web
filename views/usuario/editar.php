<div class="form">

    <?php if(isset($_SESSION['registro']) && $_SESSION['registro'] == 'correcto'):?>
        <div style="background-color: green; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Registrado correctamente</p>
        </div>
    <?php elseif(isset($_SESSION['registro']) && $_SESSION['registro'] == 'incorrecto'):?>
        <div style="background-color: red; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al registrarse</p>
        </div>
    <?php endif;?>
    <?php Utils::eliminarSesion('registro') ?>

    <h3>Editar mis datos</h3>
    <p>Rellene los datos del formulario para editarlos</p>
    <form action="<?=base_url?>Usuario/save" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Introduzca su nombre">
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" placeholder="Introduzca sus apellidos">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" placeholder="Introduzca su correo electroncio">
        <label for="passworr">Contraseña</label>
        <input type="password" name="password" placeholder="Introduzca su contraseña">
        <input type="submit" value="Registrar" class="btn-primary">
    </form>
</div>