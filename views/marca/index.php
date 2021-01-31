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
        <?php Utils::eliminar_directorio('uploads/marcas/Prueba_5') ?>

        <div class="title">
            <h2>Listado de marcas</h2>
        </div>

        <table>
            <tr>
                <th>Imagen</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
            <?php $marcas = Utils::showMarca() ?>
            <?php while($marca = $marcas->fetch_object()): ?>
            <tr>
                <td><img src="<?=base_url?>uploads/marcas/<?=$marca->ruta_imagen?>/<?=$marca->imagen?>" width="50px"></td>
                <td><?=$marca->id?></td>
                <td><?=$marca->nombre?></td>
                <td>
                    <a href="<?=base_url?>Marca/editar&id=<?=$marca->id?>">Editar</a>
                    <a href="<?=base_url?>Marca/eliminar&id=<?=$marca->id?>&directorio=<?=$marca->ruta_imagen?>&fichero=<?=$marca->imagen?>">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>