<div id="login" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <div class="row">
                    <div class="col-4">
                        <img src="<?=base_url?>assets/img/logo_ib.png" width="100px">
                    </div>

                    <div class="col-8">
                        <h5 class="modal-title">Iniciar Sesión</h5>
                        <p>Compra más rápido y revisa los detalles de tus compras</p>
                    </div>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_login" method="POST" class="needs-validation" novalidate>

                    <div id="login-ok" class="alert alert-success alert-dismissible fade show" role="alert">
                        Login Ok!
                    </div>
                    <div id="login-error" class="alert alert-danger alert-dismissible fade show" role="alert">
                        Usuario o contraseña incorrectos
                    </div>
                    
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Introduzca su correo electroncio" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su correo.
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="pass form-control" name="password" placeholder="Introduzca su contraseña" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese su contraseña.
                        </div>
                    </div>
                    <button id="btn_login" type="button" class="btn btn-success">Iniciar Sesión</button>
                    
                    <hr>
                    
                    <div class="form-group">
                        <p>¿No tienes tu cuenta?</p>
                        <span><a href="<?=base_url?>Usuario/register">Creala aquí</a></span>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>