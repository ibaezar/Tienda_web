<div class="row">
    <div class="col"></div>
    <div class="col-10">
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
                <td><img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="50px"></td>
                <td><?=$producto->nombre?></td>
                <td>$<?=number_format($producto->precio, 0, ',', '.')?></td>
                <td>
                    <a href="<?=base_url?>Carrito/down&index=<?=$indice?>">-</a>
                    <?=$elemento['unidades']?>
                    <a href="<?=base_url?>Carrito/up&index=<?=$indice?>">+</a>
                </td>
                <td><a href="<?=base_url?>Carrito/remove&id=<?=$indice?>" class="btn-danger">Quitar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <?php $total = Utils::stateCart()['total']?>
    <div>
        <p>Total: <strong>$<?=number_format($total, 0, ',', '.')?></strong></p>
    </div>

    <a href="<?=base_url?>Pedido/hacer" class="btn-success">Continuar con la compra</a>
    <a href="<?=base_url?>" class="btn-primary">Seguir agregando productos</a>
    <a href="<?=base_url?>Carrito/delete" class="btn-danger">Vaciar carrito</a>

<?php else:?>
    <p>No tienes productos en el carrito de compras</p>
    <a href="<?=base_url?>" class="btn-primary">Revisa nuestros productos</a>
<?php endif; ?>
<hr>
    </div>
    <div class="col"></div>
</div>