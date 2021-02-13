<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>
    <div class="col">
    
        <div class="title">
            <h2>Listado de categorias</h2>
        </div>

        <?php if(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'correcto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Categoria eliminada exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php elseif(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'error_fichero'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al eliminar el fichero.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php elseif(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'error_directorio'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al eliminar el directorio.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

        <?php elseif(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'incorrecto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Error al eliminar la categoria.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('eliminar_categoria') ?>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <?php $categorias = Utils::showcategory() ?>
            <?php while($categoria = $categorias->fetch_object()): ?>
            <tbody>
                <tr>
                    <th scope="row"><?=$categoria->id?></th>
                    <td><?=$categoria->nombre?></td>
                    <td>
                        <a href="<?=base_url?>categoria/update&id=<?=$categoria->id?>" class="btn btn-info">Editar</a>
                        <a href="<?=base_url?>categoria/eliminar&id=<?=$categoria->id?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
    </div>
</div>