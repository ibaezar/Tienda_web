<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>
    <div class="col">

    <div class="title">
        <h2>Listado de marcas</h2>
    </div>

        <?php if(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'correcto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Marca eliminada exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php elseif(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'error_fichero'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al eliminar el fichero.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'error_directorio'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al eliminar el directorio.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php elseif(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'incorrecto'):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al eliminar la marca.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('eliminar_marca') ?>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <?php $marcas = Utils::showMarca() ?>
            <?php while($marca = $marcas->fetch_object()): ?>
            <tbody>
                <tr>
                    <th scope="row"><img src="<?=base_url?>uploads/marcas/<?=$marca->ruta_imagen?>/<?=$marca->imagen?>" width="50px"></th>
                    <td><?=$marca->id?></td>
                    <td><?=$marca->nombre?></td>
                    <td>
                        <a href="<?=base_url?>Marca/update&id=<?=$marca->id?>" class="btn btn-info">Editar</a>
                        <a href="<?=base_url?>Marca/eliminar&id=<?=$marca->id?>&directorio=<?=$marca->ruta_imagen?>&fichero=<?=$marca->imagen?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
    </div>
</div>