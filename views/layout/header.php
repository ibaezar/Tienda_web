<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/content.css">

    <!--Slider-->
    <link href="<?=base_url?>assets/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url?>assets/js/owl-carousel/owl.theme.css" rel="stylesheet">

    <script type="text/javascript" src="<?=base_url?>assets/jquery/jquery-3.5.1.min.js"></script>
    
    <script src="<?=base_url?>assets/js/owl-carousel/owl.carousel.js"></script>

    <title>Tienda Web</title>
</head>

<body>

    <div class="container-fluid">
        <!--Encabezado-->
        <header>
            <div id="header" class="row">
                <div id="logo" class="col">
                    <a href="<?=base_url?>">
                        <img src="<?=base_url?>assets/img/logo_ib_sin_fondo.png">    
                        Tienda Web
                    </a>
                </div>
                <div class="col-5">
                    <p>Gastos de envío <strong>Gratuitos</strong> para la ciudad local</p>
                </div>
                <div class="col">
                    <a href="#">¿Necesitas ayuda?</a>
                </div>
            </div>
            <div id="menu" class="row">
                <div class="col-7">
                    <nav>
                        <ul>
                            <li><a href="<?=base_url?>">Inicio</a></li>
                            <?php $categorias = Utils::showCategory() ?>
                                <?php while($cat = $categorias->fetch_object()): ?>
                                    <li><a href="#"><?=$cat->nombre?></a></li>
                                <?php endwhile; ?>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-5">
                    <?php if(isset($_SESSION['login'])): ?>
                        <div class="login">
                            <p>
                                Bienvenido: 
                                <strong>
                                    <?=$_SESSION['login']->nombre?> 
                                    <?=$_SESSION['login']->apellidos?>
                                </strong>
                                <?php if(isset($_SESSION['admin'])): ?>
                                    <a href="<?=base_url?>Categoria/crear">Administración</a>
                                <?php endif; ?>
                                <a href="<?=base_url?>Usuario/logout">Cerrar Sesión</a>
                                <?php $estado = Utils::stateCart() ?>
                                <?php $estado['count'] > 0 ? $color="green" : $color="red" ?>
                                <a href="<?=base_url?>Carrito/index">Carrito <strong style="color: <?=$color?>">(<?=$estado['count']?>)</strong></a>
                            </p>
                        </div>
                    <?php elseif(!isset($_SESSION['login'])): ?>
                        <nav class="nav_login">
                            <ul>
                                <li><a href="<?=base_url?>Usuario/access">Login</a></li>
                                <li><a href="<?=base_url?>Usuario/register">Registro</a></li>
                                <?php $estado = Utils::stateCart() ?>
                            <li>
                                <?php $estado['count'] > 0 ? $color="green" : $color="red" ?>
                                <a href="<?=base_url?>Carrito/index">Carrito <strong style="color: <?=$color?>">(<?=$estado['count']?>)</strong></a>
                            </li>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <!--Contenido de la página-->
        