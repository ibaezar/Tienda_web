<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="form">
        <?php if(isset($_SESSION['crear_producto']) && $_SESSION['crear_producto'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">producto creado exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['crear_producto']) && $_SESSION['crear_producto'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al crear el producto</p>
            </div>
        <?php elseif(isset($_SESSION['crear_producto']) && $_SESSION['crear_producto'] == 'imagen_incorrecta'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Seleccione una imagen correcta</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('crear_producto') ?>

        <h1>Página para crear productos</h1>

        <form action="<?=base_url?>Producto/save" method="POST" enctype="multipart/form-data">
            <h3>Ingrese los datos solicitados</h3>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre de la producto">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" placeholder="Descripcion del producto"></textarea>
            <label for="detalle">Detalle</label>
            <textarea name="detalle" placeholder="Detalle del producto"></textarea>
            <label for="precio">Precio</label>
            <input type="number" name="precio" placeholder="9990">
            <label for="stock">Stock</label>
            <input type="number" name="stock" placeholder="10">
            <label for="oferta">¿En oferta?</label>
            <select name="oferta">
                <option value="si">Si</option>
                <option value="no">No</option>
            </select>
            <label for="Marca">Marca</label>
            <select name="marca">
                <?php $marcas = Utils::showMarca() ?>
                    <?php while($marca = $marcas->fetch_object()): ?>
                        <option value="<?=$marca->id?>"><?=$marca->nombre?></option>
                    <?php endwhile; ?>
            </select>
            <label for="Categoria">Categoria</label>
            <select name="categoria">
                <?php $categorias = Utils::showCategory() ?>
                    <?php while($cat = $categorias->fetch_object()): ?>
                        <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
                    <?php endwhile; ?>
            </select>
            <label for="imagen">Imagen principal</label>
            <input type="file" name="imagen" accept="image/*">

            <label for="imagenes">Galeria Imagenes</label>
            <input type="file" name="imagenes[]" accept="image/*" multiple>

            <input type="submit" Value="Crear" class="btn btn-primary">
        </form>
    </div>
</div>