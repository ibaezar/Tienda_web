<?php

require_once 'models/marca.php';

class MarcaController{

    public function index(){
        Utils::isAdmin();
        require_once 'views/marca/index.php';
    }

    public function crear(){
        Utils::isAdmin();
        require_once 'views/marca/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST)){
            $marca = new Marca();
            $marca->setNombre($_POST['nombre']);

            //Dar nombre a directorio de imagen
            $directorio = $marca->getNombre();
            $directorio = preg_replace('([^A-Za-z0-9] )', ' ', $directorio);
            $directorio = str_replace(' ', '_', $directorio);

            $marca->setRuta_imagen($directorio);

            //Capturar y guardar imagen
            $file = $_FILES['imagen'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                //guardar la imagen
                if(!is_dir("uploads/marcas/$directorio")){
                    mkdir("uploads/marcas/$directorio", 0777, true);
                }
                move_uploaded_file($file['tmp_name'], "uploads/marcas/$directorio/".$filename);
                $marca->setImagen($filename);

                //Ejecutar funcion para guardar el producto
                $crear = $marca->save();

                if($crear){
                    $_SESSION['crear_marca'] = 'correcto';
                }else{
                    $_SESSION['crear_marca'] = 'incorrecto';
                }
            }else{
                $_SESSION['crear_marca'] = 'incorrecto';
            }
            header("Location:".base_url.'marca/crear');
        }
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_POST['marca'])){
            $id_marca = $_POST['marca'];
            $marca = new Marca();
            $marca->setId($id_marca);
            $nombre_marca = $marca->getOne($id_marca)->nombre;
            $marca->setNombre($nombre_marca);

            //Dar nombre a directorio de imagen
            $directorio = $marca->getNombre();
            $directorio = preg_replace('([^A-Za-z0-9] )', ' ', $directorio);
            $directorio = str_replace(' ', '_', $directorio);

            $marca->setRuta_imagen($directorio);

            //Capturar y guardar imagen
            $file = $_FILES['imagen'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif"){
                //guardar la imagen
                if(!is_dir("uploads/marcas/$directorio")){
                    mkdir("uploads/marcas/$directorio", 0777, true);
                }
                move_uploaded_file($file['tmp_name'], "uploads/marcas/$directorio/".$filename);
                $marca->setImagen($filename);

                //Ejecutar funcion para guardar el producto
                $crear = $marca->editar();

                if($crear){
                    $_SESSION['editar_marca'] = 'correcto';
                }else{
                    $_SESSION['editar_marca'] = 'incorrecto';
                }
            }else{
                $_SESSION['editar_marca'] = 'incorrecto';
            }
            header("Location:".base_url.'marca/editar');
            
        }
        require_once 'views/marca/editar.php';
    }

    public function eliminar(){
        Utils::isAdmin();
        if(isset($_GET['id']) && isset($_GET['directorio']) && isset($_GET['fichero'])){
            $id = $_GET['id'];
            $directorio = $_GET['directorio'];
            $fichero = $_GET['fichero'];
            $marca = new Marca();
            $marca->setId($id);
            $delete = $marca->eliminar();
            if($delete){
                //Eliminar la imagen contenida para posteriormente eliminar la carpeta
                $del_fichero = Utils::eliminar_fichero('uploads/marcas/'.$directorio.'/'.$fichero);
                if($del_fichero){
                    $del_directorio = Utils::eliminar_directorio('uploads/marcas/'.$directorio);
                    if($del_directorio){
                        $_SESSION['eliminar_marca'] = 'correcto';
                    }else{
                        $_SESSION['eliminar_marca'] = 'error_directorio';
                    }
                }else{
                    $_SESSION['eliminar_marca'] = 'error_fichero';
                }
            }else{
                $_SESSION['eliminar_marca'] = 'incorrecto';
            }
        }
        header("Location:".base_url."Marca/index");
    }
}

?>