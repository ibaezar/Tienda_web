<div class="form">

    <h3>Mis datos</h3>
    
    
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
        </tr>
        <?php while($usuario = $datos_usuario->fetch_object()): ?>
        <tr>
            <td><?=$usuario->imagen?></td>
            <td><?=$usuario->nombre?></td>
            <td><?=$usuario->apellidos?></td>
            <td><?=$usuario->email?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>