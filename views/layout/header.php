<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/content.css">
    <title>Tienda Web</title>
</head>

<body>

    <div class="container-fluid">
        <!--Encabezado-->
        <header>
            <div id="header" class="row">
                <div id="logo" class="col">
                    <a href="<?=base_url?>index.php">
                        <img src="<?=base_url?>assets/img/logo_ib_sin_fondo.png">    
                        Tienda Web
                    </a>
                </div>
                <div class="col-5">
                    <p>Gastos de envío <strong>Gratuitos</strong> para la ciudad de yumbel</p>
                </div>
                <div class="col">
                    <a href="#">¿Necesitas ayuda?</a>
                </div>
            </div>
            <div id="menu" class="row">
                <div class="col-10">
                    <nav>
                        <ul>
                            <li><a href="<?=base_url?>index.php">Inicio</a></li>
                            <li><a href="#">Celulares y Smartphones</a></li>
                            <li><a href="#">Accesorios</a></li>
                            <li><a href="#">Servicio técnico</a></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-2">
                    <nav>
                        <ul>
                            <li><a href="<?=base_url?>Usuario/access">Login</a></li>
                            <li><a href="<?=base_url?>Usuario/register">Registro</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <!--Contenido de la página-->
        <div class="row">
            <div id="content" class="col">