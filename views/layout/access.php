<div class="form">
    <h3>Inicio de sesión</h3>
    <p>Introduzca sus credenciales para iniciar sesión</p>
    <p>¿No tienes cuenta? Entra <a href="<?=base_url?>Usuario/register">aquí</a> para crearla gratis</p>
    <form action="<?=base_url?>/Usuario/login" method="POST">
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" placeholder="Introduzca su correo electroncio">
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Introduzca su contraseña">
        <input type="submit" value="Iniciar sesión" class="btn-primary">
    </form>
</div>