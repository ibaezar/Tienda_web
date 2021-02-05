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
            //header("Location:".base_url.'Marca/crear');
            echo '<script>window.location="'.base_url.'Marca/crear"</script>';
        }
    }

    public function update(){
        Utils::isAdmin();
        if(isset($_GET['id'])){
            $_SESSION['marca'] = $_GET['id'];
            $id = $_GET['id'];
            $marca = new Marca();
            $marca->setId($id);
            $nombre_marca = $marca->getOne()->nombre;
            
        }else{
            //header("Location:".base_url."Marca/index");
            echo '<script>window.location="'.base_url.'Marca/index"</script>';
        }
        require_once 'views/marca/editar.php';
    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_POST['nombre']) && isset($_SESSION['marca'])){
            $id_marca = $_SESSION['marca'];
            $nombre_marca = $_POST['nombre'];

            $marca = new Marca();
            $marca->setId($id_marca);
            $marca->setNombre($nombre_marca);

            if($_FILES['imagen']['name'] == null){
                $crear = $marca->editar();
                if($crear){
                    $_SESSION['editar_marca'] = 'correcto';
                }else{
                    $_SESSION['editar_marca'] = 'incorrecto';
                }
                //header("Location:".base_url."marca/update&id=".$id_marca);
                echo '<script>window.location="'.base_url.'Marca/update&id='.$id_marca.'"</script>';
            }elseif($_FILES['imagen']['name'] != null){
                //Obtener nombres de la imagen y directorio anteriores para eliminarlos.
                $fichero_ant = $marca->getOne()->imagen;
                $directorio_ant = $marca->getOne()->ruta_imagen;

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
                    $crear = $marca->editarImagen();

                    if($crear){
                        $_SESSION['editar_marca'] = 'correcto';
                        //Eliminamos imagen y directorios antiguos
                        $del_fichero = Utils::eliminar_fichero('uploads/marcas/'.$directorio_ant.'/'.$fichero_ant);
                        if($del_fichero){
                            Utils::eliminar_directorio('uploads/marcas/'.$directorio_ant);
                        }
                    }else{
                        $_SESSION['editar_marca'] = 'incorrecto';
                    }
                }else{
                    $_SESSION['editar_marca'] = 'incorrecto';
                }
                //header("Location:".base_url."marca/update&id=".$id_marca);
                echo '<script>window.location="'.base_url.'Marca/update&id='.$id_marca.'"</script>';
            }
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
        //header("Location:".base_url."Marca/index");
        echo '<script>window.location="'.base_url.'Marca/index"</script>';
    }
}

?>