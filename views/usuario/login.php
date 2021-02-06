<div class="form">

    <?php if(isset($_SESSION['login_error'])):?>
        <div style="background-color: red; height: 50px; margin-bottom: 10px">
            <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Usuario o contraseña incorrectos</p>
        </div>
    <?php endif;?>
    <?php Utils::eliminarSesion('login_error') ?>

    <h3>Inicio de sesión</h3>
    <p>Introduzca sus credenciales para iniciar sesión</p>
    <p>¿No tienes cuenta? Entra <a href="<?=base_url?>Usuario/register">aquí</a> para crearla gratis</p>
    <form action="<?=base_url?>/Usuario/access" method="POST">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" placeholder="Introduzca su correo electroncio">
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Introduzca su contraseña">
        <input type="submit" value="Iniciar sesión" class="btn btn-primary">
    </form>
</div>