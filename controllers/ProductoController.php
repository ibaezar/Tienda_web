<?php

require_once 'models/producto.php';
require_once 'models/marca.php';
require_once 'models/imagenes.php';

class ProductoController{

    public function index(){
        require_once 'views/producto/slider.php';
        require_once 'views/producto/index.php';
        require_once 'views/producto/slider_marca.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function listar(){
        Utils::isAdmin();
        require_once 'views/producto/listar.php';
    }

    public function detalle(){
        if(isset($_GET['id'])){
            //Retornar datos del producto
            $producto_id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($producto_id);
            $product = $producto->getOne();

            //Retornar datos de la marca
            $marca_id = $product->marca_id;
            $marca = new Marca();
            $marca->setId($marca_id);
            $marc = $marca->getOne();
        }
        require_once 'views/producto/detalle.php';
    }

    public function save(){
        Utils::isAdmin();
        $crear = false;
        if(isset($_POST) && isset($_FILES['imagen']) && isset($_FILES['imagenes'])){
            $producto = new Producto();
            $producto->setNombre($_POST['nombre']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setDetalle($_POST['detalle']);
            $producto->setPrecio($_POST['precio']);
            $producto->setStock($_POST['stock']);
            $producto->setOferta($_POST['oferta']);
            $producto->setCategoria_id($_POST['categoria']);
            $producto->setMarca_id($_POST['marca']);

            //Dar nombre a directorio de imagen
            $directorio = $producto->getNombre();
            $directorio = preg_replace('([^A-Za-z0-9] )', ' ', $directorio);
            $directorio = str_replace(' ', '_', $directorio);

            $producto->setRuta_imagen($directorio);

            //Capturar y guardar imagen
            $file = $_FILES['imagen'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                //guardar la imagen
                if(!is_dir("uploads/productos/$directorio")){
                    mkdir("uploads/productos/$directorio", 0777, true);
                }
                move_uploaded_file($file['tmp_name'], "uploads/productos/$directorio/".$filename);
                $producto->setImagen($filename);

                //Ejecutar funcion para guardar el producto
                $crear = $producto->save();

            }else{
                $_SESSION['crear_producto'] = 'error_imagen';
            }

            if($crear){

                //obtener ID del ultimo producto creado.
                $producto = new Producto();
                $producto_id = $producto->getLastIdProducto()->producto_id;

                /*##########################Guardar galeria de imagenes###########################*/
                $imagenes = $_FILES['imagenes'];
                $cantidad = count($imagenes['name']);

                $validado = false;

                for($i = 0; $i < $cantidad; $i++){
                    $name = $imagenes['name'][$i];
                    $type = $imagenes['type'][$i];
                    $tmp_name = $imagenes['tmp_name'][$i];

                    if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){

                        move_uploaded_file($tmp_name, "uploads/productos/$directorio/".$name);

                        $galeria = new Imagenes();
                        $galeria->setProducto_id($producto_id);
                        $galeria->setImagen($name);
                        //Usamos directorio creado anteriormente
                        $galeria->setRuta_imagen($directorio);
                        $guardado = $galeria->save();

                        if($guardado){
                            $validado = true;
                        }else{
                            $validado = false;
                        }
                    }else{
                        $validado = false;
                    }
                }

                if($validado){
                    $_SESSION['crear_producto'] = 'correcto';
                }else{
                    $_SESSION['crear_producto'] = 'error_imagenes';
                }

            }else{
                $_SESSION['crear_producto'] = 'incorrecto';
            }
        }else{
            $_SESSION['crear_producto'] = 'incorrecto';
        }
        header("Location:".base_url.'Producto/crear');
    }

    public function update(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $_SESSION['producto'] = $_GET['id'];
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $producto = $producto->getOne();
            
        }else{
            header("Location:".base_url."Producto/listar");
        }
        require_once 'views/producto/editar.php';
    }

    public function editar(){
        Utils::isAdmin();
        /*########## PRIMER CASO ##########*/
        if(isset($_POST['nombre']) && isset($_SESSION['producto'])){
            $producto_id = $_SESSION['producto'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $detalle = $_POST['detalle'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $oferta = $_POST['oferta'];
            $marca = $_POST['marca'];
            $categoria = $_POST['categoria'];

            $producto = new Producto();
            $producto->setId($producto_id);
            $producto->setCategoria_id($categoria);
            $producto->setMarca_id($marca);
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setDetalle($detalle);
            $producto->setPrecio($precio);
            $producto->setStock($stock);
            $producto->setOferta($oferta);

            //Obtener imagen y ruta antiguos
            $fichero_ant = $producto->getOne()->imagen;
            $directorio = $producto->getOne()->ruta_imagen;

            if($_FILES['imagen']['error'] == 4 && $_FILES['imagenes']['error'][0] == 4){
                //Funcion editar sin modificar imagen
                $editado = $producto->editar(1);
                if($editado){
                    $_SESSION['editar_producto'] = 'correcto';
                }else{
                    $_SESSION['editar_producto'] = 'incorrecto';
                }

            /*########## SEGUNDO CASO ##########*/    
            }elseif($_FILES['imagen']['error'] == 0 && $_FILES['imagenes']['error'][0] == 4){
                //Capturamos datos de la imagen nueva
                $name = $_FILES['imagen']['name'];
                $type = $_FILES['imagen']['type'];
                $tmp_name = $_FILES['imagen']['tmp_name'];
                //Comprobamos que la imagen sea correcta
                if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){
                    //subimos la imagen al directorio correspondiente
                    move_uploaded_file($tmp_name, "uploads/productos/$directorio/".$name);
                    $producto->setImagen($name);
                    $producto->setRuta_imagen($directorio);
                    //Ejecutamos la accion para editar los datos
                    //Funcion editar modificando la imagen
                    $editar = $producto->editar(2);
                    if($editar){
                        //Eliminar imagen anterior
                        $del_fichero = Utils::eliminar_fichero('uploads/productos/'.$directorio.'/'.$fichero_ant);
                        if($del_fichero){
                            $_SESSION['editar_producto'] = 'correcto';
                        }else{
                            $_SESSION['editar_producto'] = 'error_eliminar_imagen';
                        }
                    }
                }else{
                    $_SESSION['editar_producto'] = 'error_imagen';
                }

            /*########## TERCER CASO ##########*/    
            }elseif($_FILES['imagen']['error'] == 4 && $_FILES['imagenes']['error'][0] == 0){

                /*##########################Guardar galeria de imagenes###########################*/
                $imagenes = $_FILES['imagenes'];
                $cantidad = count($imagenes['name']);

                $galeria = new Imagenes();
                $galeria->setProducto_id($producto_id);

                //Eliminar imagenes anteriores del directorio
                $imagenes_galeria = $galeria->getAll();

                while($name = $imagenes_galeria->fetch_object()){
                    Utils::eliminar_fichero('uploads/productos/'.$directorio.'/'.$name->imagen);
                }
                //Eliminamos las imagenes de la base de datos
                $galeria_deleted = $galeria->deleteAll();

                //Guardar nuevas imagenes
                if($galeria_deleted){
                    
                    $validado = false;
                    //Recorremos todas las imagenes recibidas desde el formulario
                    for($i = 0; $i < $cantidad; $i++){
                        $name = $imagenes['name'][$i];
                        $type = $imagenes['type'][$i];
                        $tmp_name = $imagenes['tmp_name'][$i];

                        if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){

                            move_uploaded_file($tmp_name, "uploads/productos/$directorio/".$name);

                            //Guardar imagen y ruta en la DB
                            $galeria->setImagen($name);
                            //Usamos directorio definido anteriormente
                            $galeria->setRuta_imagen($directorio);
                            $guardado = $galeria->save();

                            if($guardado){
                                $validado = true;
                            }else{
                                $validado = false;
                            }

                        }else{
                            $_SESSION['editar_producto'] = 'error_imagenes';
                            exit();
                        }
                    }

                    if($validado){
                        //Funcion editar sin modificar la imagen
                        $editar = $producto->editar(1);
                        if($editar){
                            $_SESSION['editar_producto'] = 'correcto';
                        }else{
                            $_SESSION['editar_producto'] = 'incorrecto';
                        }
                    }else{
                        $_SESSION['editar_producto'] = 'error_imagen';
                    }

                }else{
                    $_SESSION['editar_producto'] = 'error_eliminar_imagenes';
                }


            /*########## CUARTO CASO ##########*/  
            }elseif($_FILES['imagen']['error'] == 0 && $_FILES['imagenes']['error'][0] == 0){
                //Capturamos datos de la imagen nueva
                $name = $_FILES['imagen']['name'];
                $type = $_FILES['imagen']['type'];
                $tmp_name = $_FILES['imagen']['tmp_name'];

                //Comprobamos que la imagen sea correcta
                if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){
                    //subimos la imagen al directorio correspondiente
                    move_uploaded_file($tmp_name, "uploads/productos/$directorio/".$name);
                    $producto->setImagen($name);
                    $producto->setRuta_imagen($directorio);
                    //Eliminar imagen anterior
                    $del_fichero = Utils::eliminar_fichero('uploads/productos/'.$directorio.'/'.$fichero_ant);

                    if($del_fichero){
                        /*##########################Guardar galeria de imagenes###########################*/
                        $imagenes = $_FILES['imagenes'];
                        $cantidad = count($imagenes['name']);

                        $galeria = new Imagenes();
                        $galeria->setProducto_id($producto_id);

                        //Eliminar imagenes anteriores del directorio
                        $imagenes_galeria = $galeria->getAll();
                        while($name = $imagenes_galeria->fetch_object()){
                            Utils::eliminar_fichero('uploads/productos/'.$directorio.'/'.$name->imagen);
                        }
                        //Eliminamos las imagenes de la base de datos
                        $galeria_deleted = $galeria->deleteAll();

                        //Guardar nuevas imagenes
                        if($galeria_deleted){
                            
                            $validado = false;
                            //Recorremos todas las imagenes recibidas desde el formulario
                            for($i = 0; $i < $cantidad; $i++){
                                $name = $imagenes['name'][$i];
                                $type = $imagenes['type'][$i];
                                $tmp_name = $imagenes['tmp_name'][$i];

                                if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){

                                    move_uploaded_file($tmp_name, "uploads/productos/$directorio/".$name);

                                    //Guardar imagen y ruta en la DB
                                    $galeria->setImagen($name);
                                    //Usamos directorio definido anteriormente
                                    $galeria->setRuta_imagen($directorio);
                                    $guardado = $galeria->save();

                                    if($guardado){
                                        $validado = true;
                                    }else{
                                        $validado = false;
                                    }

                                }else{
                                    $validado = false;
                                }
                            }

                            if($validado){
                                //Funcion editar modificando la imagen
                                $editar = $producto->editar(2);
                                if($editar){
                                    $_SESSION['editar_producto'] = 'correcto';
                                }else{
                                    $_SESSION['editar_producto'] = 'incorrecto';
                                }
                            }else{
                                $_SESSION['editar_producto'] = 'error_imagenes';
                            }

                        }else{
                            $_SESSION['editar_producto'] = 'error_eliminar_imagenes';
                        }

                    }else{
                        $_SESSION['editar_producto'] = 'error_eliminar_imagenes';
                    }
                }else{
                    $_SESSION['editar_producto'] = 'error_imagen';
                }
            }else{
                $_SESSION['editar_producto'] = 'incorrecto';
            }
            //Fuera de la condicion (Redirige en cualquiera de los casos)
            header("Location:".base_url."Producto/update&id=".$producto_id);
        }
    }
}
?>