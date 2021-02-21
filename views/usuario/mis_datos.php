<div class="row">
    <div class="col"></div>
    <div class="col-12 col-xl-10">
        <div class="row">
            <div class="col-12 col-md-4">
                <?php while($usuario = $datos_usuario->fetch_object()): ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="mi-cuenta">
                                <div class="cuenta-imagen">
                                    <?php if($usuario->imagen): ?>
                                        <img src="<?=base_url?>uploads/usuarios/<?=$usuario->ruta_imagen?>/<?=$usuario->imagen?>" width="50px">
                                    <?php else: ?>
                                        <img src="<?=base_url?>assets/img/sin_imagen.png" alt="">
                                    <?php endif; ?>
                                </div>
                                <br>
                                <p class="nombre"><strong><?=$usuario->nombre?> <?=$usuario->apellidos?></strong></p>
                                <p class="email"><?=$usuario->email?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="col-12 col-md-8">
                <div class="card mis_datos">
                    <div class="card-header">
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
                    </div>
                    <div class="card-body">
                        <p>Rellene los datos del formulario para editarlos</p>
                        <form action="<?=base_url?>Usuario/update" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Introduzca su nombre" value="<?=$_SESSION['login']->nombre?>" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese el nombre.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellidos" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" placeholder="Introduzca sus apellidos" value="<?=$_SESSION['login']->apellidos?>" required>
                                <div class="invalid-feedback">
                                    Por favor, ingrese los apellidos.
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Añadir o cargar imagen (opcional)</label>
                                <div class="custom-file">
                                    <label for="imagen" class="custom-file-label" style="overflow: hidden;">Imagen</label>
                                    <input type="file" class="custom-file-input" name="imagen" accept="image/*">
                                    <div class="invalid-feedback">
                                        Por favor, seleccione una imagen correcta.
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Editar" class="btn btn-info">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>