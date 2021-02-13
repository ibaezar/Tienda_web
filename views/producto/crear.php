<div class="row">
    <?php require_once 'views/administrador/aside.php'; ?>

    <div class="card-header">
        <h3>Página para crear productos</h3>
    </div>

    <div class="card" style="margin: auto; margin-top: 30px;">
        <?php if(isset($_SESSION['crear_producto']) && $_SESSION['crear_producto'] == 'correcto'):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Producto creado exitosamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['crear_producto']) && $_SESSION['crear_producto'] == 'incorrecto'):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al crear el producto.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php elseif(isset($_SESSION['crear_producto']) && $_SESSION['crear_producto'] == 'imagen_incorrecta'):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Seleccione una imagen correcta.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif;?>
        <?php Utils::eliminarSesion('crear_producto') ?>
        
        <div class="card-body">
            <form action="<?=base_url?>Producto/save" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <h6>Ingrese los datos solicitados</h6>
                </div>
                <div class="form-row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre de la producto" required>
                        <div class="invalid-feedback">
                                Por favor, ingrese el nombre del producto
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" name="precio" placeholder="9990" required>
                        <div class="invalid-feedback">
                                Por favor, ingrese el valor
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="10" required>
                        <div class="invalid-feedback">
                                Por favor, ingrese la cantidad
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="oferta">¿En oferta?</label>
                        <select name="oferta" class="form-control" required>
                            <option value="si">Si</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6">
                        <label for="Marca">Marca</label>
                        <select name="marca" class="form-control" required>
                            <?php $marcas = Utils::showMarca() ?>
                                <?php while($marca = $marcas->fetch_object()): ?>
                                    <option value="<?=$marca->id?>"><?=$marca->nombre?></option>
                                <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="Categoria">Categoria</label>
                        <select name="categoria" class="form-control" required>
                            <?php $categorias = Utils::showCategory() ?>
                                <?php while($cat = $categorias->fetch_object()): ?>
                                    <option value="<?=$cat->id?>"><?=$cat->nombre?></option>
                                <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripcion del producto" required></textarea>
                    <div class="invalid-feedback">
                        Por favor, ingrese la descripción del producto
                    </div>
                </div>

                <div class="form-group">
                    <label for="detalle">Detalle</label>
                    <textarea class="form-control" name="detalle" rows="4" placeholder="Detalle del producto" required></textarea>
                    <div class="invalid-feedback">
                        Por favor, ingrese el detalle del producto
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="custom-file">
                            <label for="imagen" class="custom-file-label">Imagen principal</label>
                            <input type="file" class="custom-file-input" name="imagen" accept="image/*" required>
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
                <input type="submit" Value="Crear" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>