<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>
    <div class="col">

        <?php if(isset($_SESSION['eliminar_producto']) && $_SESSION['eliminar_marca'] == 'correcto'):?>
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
            <h2>Listado de productos</h2>
        </div>

        <table>
            <tr>
                <th>Imagen</th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
            <?php $productos = Utils::showProducts() ?>
            <?php while($producto = $productos->fetch_object()): ?>
            <tr>
                <td><img src="<?=base_url?>uploads/productos/<?=$producto->ruta_imagen?>/<?=$producto->imagen?>" width="50px"></td>
                <td><?=$producto->id?></td>
                <td><?=$producto->nombre?></td>
                <td><?=$producto->nombre_categoria?></td>
                <td><?=$producto->precio?></td>
                <td>
                    <a href="<?=base_url?>producto/update&id=<?=$producto->id?>">Editar</a>
                    <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>&directorio=<?=$producto->ruta_imagen?>&fichero=<?=$producto->imagen?>">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>