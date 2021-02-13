<div class="form">

    <?php if(isset($_SESSION['registro']) && $_SESSION['registro'] == 'correcto'):?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Uuario registrado exitosamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php elseif(isset($_SESSION['registro']) && $_SESSION['registro'] == 'incorrecto'):?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Error al registrar el usuario, intentelo nuevamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php endif;?>
    <?php Utils::eliminarSesion('registro') ?>

    <h3>Registro de usuario</h3>
    <p>Rellene los datos del formulario para completar el registro de su cuenta</p>
    <form action="<?=base_url?>Usuario/save" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Introduzca su nombre">
        <label for="apellidos">Apellidos</label>
        <input type="text" name="apellidos" placeholder="Introduzca sus apellidos">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" placeholder="Introduzca su correo electroncio">
        <label for="passworr">Contraseña</label>
        <input type="password" name="password" placeholder="Introduzca su contraseña">
        <input type="submit" value="Registrar" class="btn btn-primary">
    </form>
    <p>¿Ya tienes tu cuenta? <span id="r_login" type="button">Iniciar sesión</span></p>
</div>