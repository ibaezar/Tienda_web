<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card" style="margin: auto; margin-top: 30px;">

        <div class="card-header">
            <h3>Página para editar productos</h3>
        </div>

        <?php if(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'correcto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Producto editado exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'incorrecto'):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al editar el producto.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_imagen'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al cargar la imagen principal.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_imagenes'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al cargar la galería de imagenes.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_eliminar_imagen'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al borrar la imagen principal anterior.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['editar_producto']) && $_SESSION['editar_producto'] == 'error_eliminar_imagenes'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Error al borrar la galería de imagenes anteriores.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('editar_producto') ?>
        
        <div class="card-body">
        <form action="<?=base_url?>Producto/editar" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <h6>Ingrese los datos solicitados</h6>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?=$producto->nombre?>" required>
                        <div class="invalid-feedback">
                                Por favor, ingrese el nombre del producto
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" value="<?=$producto->precio?>" required>
                        <div class="invalid-feedback">
                                Por favor, ingrese el valor
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" value="<?=$producto->stock?>" required>
                        <div class="invalid-feedback">
                                Por favor, ingrese la cantidad
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="oferta">¿En oferta?</label>
                        <select name="oferta" class="form-control" required>
                            <option value="si" <?=$producto->oferta == 'si' ? 'selected' : '' ?>>Si</option>
                            <option value="no" <?=$producto->oferta == 'no' ? 'selected' : '' ?>>No</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="Marca">Marca</label>
                        <select name="marca" class="form-control" required>
                            <?php $marcas = Utils::showMarca() ?>
                            <?php while($marca = $marcas->fetch_object()): ?>
                                <option value="<?=$marca->id?>" <?=$marca->id == (int)$producto->marca_id ? 'selected' : '' ?>>
                                    <?=$marca->nombre?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="Categoria">Categoria</label>
                        <select name="categoria" class="form-control" required>
                            <?php $categorias = Utils::showCategory() ?>
                            <?php while($cat = $categorias->fetch_object()): ?>
                                <option value="<?=$cat->id?>"  <?=$cat->id == (int)$producto->categoria_id ? 'selected' : '' ?>>
                                    <?=$cat->nombre?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripcion del producto" required><?=$producto->descripcion?></textarea>
                    <div class="invalid-feedback">
                        Por favor, ingrese la descripción del producto
                    </div>
                </div>

                <div class="form-group">
                    <label for="detalle">Detalle</label>
                    <textarea class="form-control" name="detalle" rows="4" placeholder="Detalle del producto" required><?=$producto->detalle?></textarea>
                    <div class="invalid-feedback">
                        Por favor, ingrese el detalle del producto
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="custom-file">
                            <label for="imagen" class="custom-file-label">Imagen principal (Opcional)</label>
                            <input type="file" class="custom-file-input" name="imagen" accept="image/*">
                            <div class="invalid-feedback">
                                Por favor, seleccione una imagen correcta.
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6">
                        <div class="custom-file">
                            <label for="imagenes" class="custom-file-label" style="overflow: hidden;">Galeria Imagenes (Opcional)</label>
                            <input type="file" class="custom-file-input" name="imagenes[]" accept="image/*" multiple>
                            <div class="invalid-feedback">
                                Por favor, seleccione una imagen correcta.
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <input type="submit" Value="Editar" class="btn btn-info">
            </form>
        </div>
    </div>
</div>