<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="form">

        <?php if(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'correcto'):?>
            <div style="background-color: green; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">producto editado exitosamente</p>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'incorrecto'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al editar el producto</p>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_imagen'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al cargar la imagen</p>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_imagenes'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al cargar las imagenes</p>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_eliminar_imagen'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al borrar el imagen anterior</p>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_eliminar_imagenes'):?>
            <div style="background-color: red; height: 50px; margin-bottom: 10px">
                <p style="color: white; text-align: center; font-size: 20px; line-height: 47px">Error al borrar imagenes anteriores</p>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_producto') ?>

        <h1>Página para editar productos</h1>

        <form action="<?=base_url?>Producto/editar" method="POST" enctype="multipart/form-data">
            <h3>Ingrese los datos solicitados</h3>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre de la producto" value="<?=$producto->nombre?>">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" placeholder="Descripcion del producto"><?=$producto->descripcion?></textarea>
            <label for="detalle">Detalle</label>
            <textarea name="detalle" placeholder="Detalle del producto"><?=$producto->detalle?></textarea>
            <label for="precio">Precio</label>
            <input type="number" name="precio" placeholder="9990" value="<?=$producto->precio?>">
            <label for="stock">Stock</label>
            <input type="number" name="stock" placeholder="10" value="<?=$producto->stock?>">
            <label for="oferta">¿En oferta?</label>
            <select name="oferta">
                <option value="si" <?=$producto->oferta == 'si' ? 'selected' : '' ?>>Si</option>
                <option value="no" <?=$producto->oferta == 'no' ? 'selected' : '' ?>>No</option>
            </select>
            <label for="Marca">Marca</label>
            <select name="marca">
                <?php $marcas = Utils::showMarca() ?>
                    <?php while($marca = $marcas->fetch_object()): ?>
                        <option value="<?=$marca->id?>" <?=$marca->id == (int)$producto->marca_id ? 'selected' : '' ?>>
                            <?=$marca->nombre?>
                        </option>
                    <?php endwhile; ?>
            </select>
            <label for="Categoria">Categoria</label>
            <select name="categoria">
                <?php $categorias = Utils::showCategory() ?>
                    <?php while($cat = $categorias->fetch_object()): ?>
                        <option value="<?=$cat->id?>"  <?=$cat->id == (int)$producto->categoria_id ? 'selected' : '' ?>>
                            <?=$cat->nombre?>
                        </option>
                    <?php endwhile; ?>
            </select>
            <label for="imagen">Imagen principal</label>
            <input type="file" name="imagen" accept="image/*">

            <label for="imagenes">Galeria Imagenes</label>
            <input type="file" name="imagenes[]" accept="image/*" multiple>

            <input type="submit" Value="editar" class="btn-primary">
        </form>
    </div>
</div>