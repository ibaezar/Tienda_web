<?php  

if(!isset($_SESSION)){
    session_start();
}

function db(){
    $servidor = 'localhost:3308';
        $user = 'root';
        $pass = '';
        $nom_db = 'tienda_web';

        $db = new mysqli($servidor, $user, $pass, $nom_db);
        $db->query("SET NAMES 'utf8'");
        return $db;
}

function loginDB($email, $password){
    $conn = db();
    $result = false;
    //Comprobar si existe el usuario en la bd
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = $conn->query($sql);

    if($login && $login->num_rows == 1){
        $usuario = $login->fetch_object();
        //Verificar la contraseña
        $verify = password_verify($password, $usuario->password);

        if($verify){
            $result = $usuario;
        }
    }
    return $result;
}

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $identity = loginDB($email, $password);

    if($identity && is_object($identity)){

        $_SESSION['login'] = $identity;

        //crear sesion admin en caso de ser necesario
        if($identity->rol == 'admin'){
            $_SESSION['admin'] = true;
        }
        echo 1;
    }else{
        echo 0;
    }
}else{
    echo 0;
}

?>