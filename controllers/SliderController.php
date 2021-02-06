<?php

require_once 'models/slider.php';

class SliderController{

    public function index(){
        Utils::isAdmin();
        $slider = new Slider();
        $imagenes = $slider->getAll();
        require_once 'views/slider/index.php';
    }

    public function editar(){
        Utils::isAdmin();
        require_once 'views/slider/editar.php';
    }

    public function update(){
        Utils::isAdmin();

        if(isset($_POST['slider'])  && $_FILES['imagenes']['error'][0] == 0){
            //Instanciar la clase Slider
            $slider = new Slider();

            //Capturar datos de las imagenes recibidas
            $imagenes = $_FILES['imagenes'];
            $cantidad = count($imagenes['name']);

            //Eliminar imagenes anteriores del directorio
            $imagenes_galeria = $slider->getAll();

            while($name = $imagenes_galeria->fetch_object()){
                Utils::eliminar_fichero('uploads/slider/'.$name->imagen);
            }
            //Eliminamos las imagenes de la base de datos
            $galeria_deleted = $slider->deleteAll();

            //Guardar nuevas imagenes
            if($galeria_deleted){
                //Recorremos todas las imagenes recibidas desde el formulario
                for($i = 0; $i < $cantidad; $i++){
                    $name = $imagenes['name'][$i];
                    $type = $imagenes['type'][$i];
                    $tmp_name = $imagenes['tmp_name'][$i];

                    if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){

                        move_uploaded_file($tmp_name, "uploads/slider/".$name);

                        //Guardar imagen en la DB
                        $slider->setImagen($name);

                        //Ejecutamos funcion para guardar imagenes en la DB
                        $editado = $slider->save();

                        if($editado){
                            $_SESSION['editar_slider'] = 'correcto';
                        }else{
                            $_SESSION['editar_slider'] = 'incorrecto';
                        }

                    }else{
                        $_SESSION['editar_slider'] = 'error_imagenes';
                    }
                }
            }else{
                $_SESSION['editar_slider'] = 'error_eliminar_imagenes';
            }
        }else{
            $_SESSION['editar_slider'] = 'empty_imagenes';
        }
        //header("Location:".base_url."Slider/editar");
        echo '<script>window.location="'.base_url.'Slider/editar"</script>';
    }
}