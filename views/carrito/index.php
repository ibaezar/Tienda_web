<h1>Carrito de compras</h1>
<hr>

<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php 
        foreach($carrito as $indice => $elemento):
        $producto = $elemento['producto'];
    ?>
        <tr>
            <td>Imagen</td>
            <td><?=$producto->nombre?></td>
            <td><?=$producto->precio?></td>
            <td><?=$elemento['unidades']?></td>
        </tr>
    <?php endforeach; ?>
</table>