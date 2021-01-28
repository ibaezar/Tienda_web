<div class="row">
    <div class="form">
    <?php if(isset($_SESSION['login'])):?>

    <h2>Hacer pedido</h2>
    <h3>Informacion del despacho</h3>

    <form action="<?=base_url?>Pedido/add" method="POST">

        <?php if(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Pedido realizado exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al realizar el pedido</p>
            </div>
        <?php endif;?>

        <p>DIRECCIÓN</p>
        <input type="text" name="ciudad" placeholder="Ciudad">
        <input type="text" name="comuna" placeholder="Comuna">
        <input type="text" name="direccion" placeholder="Calle y numero">
        <input type="text" name="depto" placeholder="Depto, Oficina, etc. (Opcional)">
        <textarea name="observacion" placeholder="Cualquier comentario que sea de utilidad para el despacho (Opcional)"></textarea>
        <input type="submit" class="btn-success" value="continuar">
        <?php Utils::eliminarSesion('pedido') ?>
    </form>
    <?php else:?>
    <h2>Debes estár registrado para poder continuar con tu pedido</h2>
    <?php endif; ?>    
    </div>
</div>