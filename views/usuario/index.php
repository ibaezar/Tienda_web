<div class="row">
    <?=isset($_SESSION['admin']) ? require_once 'views/administrador/aside.php' : null ?>
    <div class="form">

        <h3>Mis datos</h3>
        
        
        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Accion</th>
            </tr>
            <?php while($usuario = $datos_usuario->fetch_object()): ?>
            <tr>
                <td><img src="<?=base_url?>uploads/usuarios/<?=$usuario->ruta_imagen?>/<?=$usuario->imagen?>" width="50px"></td>
                <td><?=$usuario->nombre?></td>
                <td><?=$usuario->apellidos?></td>
                <td><?=$usuario->email?></td>
                <td><a href="<?=base_url?>Usuario/editar" class="btn btn-info">Editar mis datos</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>