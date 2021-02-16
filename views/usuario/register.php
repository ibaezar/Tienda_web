<div class="row">
    <div class="col"></div>
    <div class="col-md-5">
        <div class="card" style="margin: 20px 0px">
            
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

            <div class="card-header">
                <h3>Registro de usuario</h3>
            </div>

            <div class="card-body">
                <p class="card-title">Rellene los datos del formulario para completar el registro de su cuenta</p>
                <form action="<?=base_url?>Usuario/save" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Introduzca su nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su nombre.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Introduzca sus apellidos" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese sus apellidos.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="Introduzca su correo electroncio" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su email.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="passworr">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Introduzca su contraseña" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su contraseña.
                        </div>
                    </div>
                    <input type="submit" value="Registrar" class="btn btn-primary">
                </form>
                <br>
                <p>¿Ya tienes tu cuenta? <span class="btn-login" type="button">Iniciar sesión</span></p>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>