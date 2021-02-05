<?php
ob_start();

require_once 'models/usuario.php';

class UsuarioController{

    public function index(){
        Utils::isLoged();
        if(isset($_SESSION['login'])){
            $usuario_id = $_SESSION['login']->id;
            $usuario = New Usuario();
            $usuario->setId($usuario_id);
            $datos_usuario = $usuario->getOne();
        }

        require_once 'views/usuario/index.php';
    }

    public function login(){
        require_once 'views/usuario/login.php';
    }

    public function register(){
        require_once 'views/usuario/register.php';
    }

    public function save(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $save = $usuario->save();

            if($save){
                $_SESSION['registro'] = 'correcto';
            }else{
                $_SESSION['registro'] = 'incorrecto';
            }
        }else{
            $_SESSION['registro'] = 'incorrecto';
        }
        //header("Location:".base_url.'Usuario/register');
        echo '<script>window.location="'.base_url.'Usuario/register"</script>';
    }

    public function access(){
        if(isset($_POST)){

            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['login'] = $identity;

                //crear sesion admin en caso de ser necesario
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }

                //header("Location:".base_url);
                echo '<script>window.location="'.base_url.'"</script>';

            }else{
                //header("Location:".base_url."Usuario/access");
                echo '<script>window.location="'.base_url.'Usuario/access"</script>';
                $_SESSION['login_error'] = 'Datos incorrectos';
            }
        }else{
            //header("Location:".base_url."Usuario/access");
            echo '<script>window.location="'.base_url.'Usuario/access"</script>';
            $_SESSION['login_error'] = 'Datos incorrectos';
        }
    }

    public function editar(){
        Utils::isLoged();
        if(isset($_SESSION['login'])){
            $usuario_id = $_SESSION['login']->id;
            $usuario = New Usuario();
            $usuario->setId($usuario_id);
            $datos_usuario = $usuario->getOne()->fetch_object();
        }
        require_once 'views/usuario/editar.php';
    }

    public function update(){
        Utils::isLoged();
        if($_POST['nombre']){
            $usuario_id = $_SESSION['login']->id;
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $usuario = New Usuario();
            $usuario->setId($usuario_id);
            $usuario->setNombre($nombre);
            $usuario->setApellidos($apellidos);
            //Obtener datos de la imagen del usuario
            $fichero = $usuario->getOne()->fetch_object()->imagen;
            $directorio = $usuario->getOne()->fetch_object()->ruta_imagen;
        }

        if($_FILES['imagen']['error'] == 4){
            //Editar datos sin imagen
            $editar = $usuario->editar(1);
            if($editar){
                $_SESSION['editar_usuario'] = 'correcto';
                $_SESSION['login'] = $usuario->getOne()->fetch_object();
            }else{
                $_SESSION['editar_usuario'] = 'incorrecto';
            }
            
        }elseif($_FILES['imagen']['error'] == 0){
            //Editar datos con imagen
            $name = $_FILES['imagen']['name'];
            $type = $_FILES['imagen']['type'];
            $tmp_name = $_FILES['imagen']['tmp_name'];
            //Comprobamos que la imagen sea correcta
            if($type == "image/jpg" || $type == "image/jpeg" || $type == "image/png" || $type == "image/gif"){
                if(!$directorio){
                    //Dar nombre a directorio de imagen
                    $directorio = $usuario->getNombre();
                    $directorio .= ' '.$usuario->getId();
                    $directorio = preg_replace('([^A-Za-z0-9] )', ' ', $directorio);
                    $directorio = str_replace(' ', '_', $directorio);
                    $usuario->setRuta_imagen($directorio);
                }
                if(!is_dir("uploads/usuarios/$directorio")){
                    mkdir("uploads/usuarios/$directorio", 0777, true);
                }
                //subimos la imagen al directorio correspondiente
                move_uploaded_file($tmp_name, "uploads/usuarios/$directorio/".$name);
                $usuario->setImagen($name);
                $usuario->setRuta_imagen($directorio);
                //Ejecutamos la accion para editar los datos
                //Funcion editar modificando la imagen
                $editar = $usuario->editar(2);
                if($editar){
                    //Eliminar imagen anterior
                    $del_fichero = Utils::eliminar_fichero('uploads/usuarios/'.$directorio.'/'.$fichero);
                    if($del_fichero){
                        $_SESSION['editar_usuario'] = 'correcto';
                        $_SESSION['login'] = $usuario->getOne()->fetch_object();
                    }else{
                        $_SESSION['editar_usuario'] = 'error_eliminar_imagen';
                    }
                }
            }else{
                $_SESSION['editar_producto'] = 'error_imagen';
            }
        }else{
            $_SESSION['editar_usuario'] = 'incorrecto';
        }
        //header("Location:".base_url."Usuario/editar");
        echo '<script>window.location="'.base_url.'Usuario/editar"</script>';
    }

    public function logout(){
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
        }
        
        //header("Location:".base_url);
        echo '<script>window.location="'.base_url.'"</script>';
    }
}

ob_end_flush();
?>