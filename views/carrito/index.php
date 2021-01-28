<h1>Carrito de compras</h1>
<hr>

<?php if(isset($_SESSION['carrito']) && $_SESSION['carrito'] != null): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Acción</th>
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
                <td><a href="<?=base_url?>Carrito/remove&id=<?=$indice?>" class="btn-danger">Eliminar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="<?=base_url?>Pedido/hacer" class="btn-success">Hacer Pedido</a>
    <a href="<?=base_url?>Carrito/delete" class="btn-danger">Vaciar carrito</a>
<?php else:?>
    <p>No tienes productos en el carrito de compras</p>
<?php endif; ?>
<hr>