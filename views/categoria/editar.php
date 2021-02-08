<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card" style="margin: auto; margin-top: 30px;">
        <?php if(isset($_SESSION['editar_categoria']) && $_SESSION['editar_categoria'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">categoria editada exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['editar_categoria']) && $_SESSION['editar_categoria'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar la categoria</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_categoria') ?>
        
        <div class="card-header">
            <h1>Página para editar categoria</h1>
        </div>
        
        <div class="card-body">
            <form action="<?=base_url?>Categoria/editar" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre de la categoria</label>
                    <input type="text" class="form-control" name="nombre" value="<?=$nombre_categoria?>" required>
                    <div class="invalid-feedback">
                        Por favor, ingrese un nombre de categoria correcto.
                    </div>
                </div>
                <input type="submit" Value="Editar" class="btn btn-info">
            </form>
        </div>
    </div>
</div>