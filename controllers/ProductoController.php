<?php

require_once 'models/producto.php';

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

    public function save(){
        Utils::isAdmin();
        $crear = false;
        if(isset($_POST)){
            /*
            var_dump($_FILES);
            die();
            */
            $producto = new Producto();
            $producto->setNombre($_POST['nombre']);
            $producto->setDescripcion($_POST['descripcion']);
            $producto->setDetalle($_POST['detalle']);
            $producto->setPrecio($_POST['precio']);
            $producto->setStock($_POST['stock']);
            $producto->setOferta($_POST['oferta']);
            $producto->setCategoria_id($_POST['categoria']);

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
                $_SESSION['crear_producto'] = 'imagen_incorrecta';
            }

            if($crear){
                $_SESSION['crear_producto'] = 'correcto';
            }else{
                $_SESSION['crear_producto'] = 'incorrecto';
            }
        }else{
            $_SESSION['crear_producto'] = 'incorrecto';
        }
        header("Location:".base_url.'Producto/crear');
    }
}
?>