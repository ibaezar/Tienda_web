<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>
    <div class="col">

        <?php if(isset($_SESSION['eliminar_producto']) && $_SESSION['eliminar_producto'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">producto eliminado exitosamente</p>
            </div>

        <?php elseif(isset($_SESSION['eliminar_producto']) && $_SESSION['eliminar_producto'] == 'error_fichero'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar el fichero</p>
            </div>
        <?php elseif(isset($_SESSION['eliminar_producto']) && $_SESSION['eliminar_producto'] == 'error_directorio'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar el directorio</p>
            </div>

        <?php elseif(isset($_SESSION['eliminar_producto']) && $_SESSION['eliminar_producto'] == 'error_constraint'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Producto está asociado a un pedido</p>
            </div>

        <?php elseif(isset($_SESSION['eliminar_producto']) && $_SESSION['eliminar_producto'] == 'error_eliminar_imagenes'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar imagenes asociadas</p>
            </div>

        <?php elseif(isset($_SESSION['eliminar_producto']) && $_SESSION['eliminar_producto'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar el producto</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('eliminar_producto') ?>

        <div class="title">
            <h2>Listado de productos</h2>
        </div>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <?php $productos = Utils::showProducts() ?>
            <?php while($producto = $productos->fetch_object()): ?>
            <tbody>
                <tr>
                    <th scope="row"><?=$producto->id?></th>
                    <td><img src="<?=base_url?>uploads/productos/<?=$producto->ruta_imagen?>/<?=$producto->imagen?>" width="50px"></td>
                    <td><?=$producto->nombre?></td>
                    <td><?=$producto->nombre_marca?></td>
                    <td><?=$producto->nombre_categoria?></td>
                    <td>$<?=number_format($producto->precio, 0, ',', '.')?></td>
                    <td>
                        <a href="<?=base_url?>producto/update&id=<?=$producto->id?>" class="btn btn-info">Editar</a>
                        <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
    </div>
</div>