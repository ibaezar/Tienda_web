<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>
    <div class="col">

        <?php if(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Marca eliminada exitosamente</p>
            </div>

            <?php elseif(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'error_fichero'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar el fichero</p>
            </div>
            <?php elseif(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'error_directorio'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar el directorio</p>
            </div>

        <?php elseif(isset($_SESSION['eliminar_marca']) && $_SESSION['eliminar_marca'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar la marca</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('eliminar_marca') ?>

        <div class="title">
            <h2>Listado de marcas</h2>
        </div>

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