<div class="row">
    <div class="col"></div>
    <div class="col-12 col-xl-10">
    <h1 class="titulo-carrito">Carrito de compras</h1>
<hr>

<?php if(isset($_SESSION['carrito']) && $_SESSION['carrito'] != null): ?>
    <table class="table table-striped carrito">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Unidades</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <?php 
            foreach($carrito as $indice => $elemento):
            $producto = $elemento['producto'];
        ?>
        <tbody>
            <tr>
                <th scope="row"><img src="<?=base_url."uploads/productos/".$producto->ruta_imagen."/".$producto->imagen?>" width="50px"></th>
                <td><?=$producto->nombre?></td>
                <td>$<?=number_format($producto->precio, 0, ',', '.')?></td>
                <td>
                    <a class="btn btn-danger" href="<?=base_url?>Carrito/down&index=<?=$indice?>">-</a>
                    <strong class="unidades"><?=$elemento['unidades']?></strong>
                    <a class="btn btn-warning" href="<?=base_url?>Carrito/up&index=<?=$indice?>">+</a>
                </td>
                <td><a href="<?=base_url?>Carrito/remove&id=<?=$indice?>" class="btn btn-danger">Quitar</a></td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
    
    <?php $total = Utils::stateCart()['total']?>
    <div>
        <p>Total: <strong>$<?=number_format($total, 0, ',', '.')?></strong></p>
    </div>

    <a href="<?=base_url?>Pedido/hacer" class="btn btn-success">Continuar con la compra</a>
    <a href="<?=base_url?>" class="btn btn-primary">Seguir agregando productos</a>
    <a href="<?=base_url?>Carrito/delete" class="btn btn-danger">Vaciar carrito</a>

<?php else:?>
    <div class="carrito-vacio">
        <p>No tienes productos en el carrito de compras</p>
        <a href="<?=base_url?>" class="btn btn-primary">Revisa nuestros productos</a>
    </div>
<?php endif; ?>
<hr>
    </div>
    <div class="col"></div>
</div>