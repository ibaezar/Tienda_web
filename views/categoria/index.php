<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>
    <div class="col">

        <?php if(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">categoria eliminada exitosamente</p>
            </div>

            <?php elseif(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'error_fichero'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar el fichero</p>
            </div>
            <?php elseif(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'error_directorio'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar el directorio</p>
            </div>

        <?php elseif(isset($_SESSION['eliminar_categoria']) && $_SESSION['eliminar_categoria'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al eliminar la categoria</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('eliminar_categoria') ?>

        <div class="title">
            <h2>Listado de categorias</h2>
        </div>

        <table>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
            <?php $categorias = Utils::showcategory() ?>
            <?php while($categoria = $categorias->fetch_object()): ?>
            <tr>
                <td><?=$categoria->id?></td>
                <td><?=$categoria->nombre?></td>
                <td>
                    <a href="<?=base_url?>categoria/update&id=<?=$categoria->id?>">Editar</a>
                    <a href="<?=base_url?>categoria/eliminar&id=<?=$categoria->id?>">Eliminar</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>