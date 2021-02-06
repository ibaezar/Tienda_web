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
            <h2>Listado de imagenes</h2>
        </div>

        <table>
            <tr>
                <th>Imagen</th>
            </tr>
            <?php while($imagen = $imagenes->fetch_object()): ?>
            <tr>
                <td><img src="<?=base_url?>uploads/slider/<?=$imagen->imagen?>" width="400px"></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>