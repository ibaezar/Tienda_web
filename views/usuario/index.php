<div class="row">
    <?=isset($_SESSION['admin']) ? require_once 'views/administrador/aside.php' : null ?>
    <div class="form">

        <h3>Mis datos</h3>
        
        
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <?php while($usuario = $datos_usuario->fetch_object()): ?>
            <tbody>
                <tr>
                    <td><img src="<?=base_url?>uploads/usuarios/<?=$usuario->ruta_imagen?>/<?=$usuario->imagen?>" width="50px"></td>
                    <td><?=$usuario->nombre?></td>
                    <td><?=$usuario->apellidos?></td>
                    <td><?=$usuario->email?></td>
                    <td><a href="<?=base_url?>Usuario/editar" class="btn btn-info">Editar mis datos</a></td>
                </tr>
            </tbody>
            <?php endwhile; ?>
        </table>
    </div>
</div>