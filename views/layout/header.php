<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/bootstrap/css/bootstrap.min.css">
    -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/content.css?v=<?php echo(rand()); ?>">

    <!--Slider-->
    <link href="<?=base_url?>assets/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url?>assets/js/owl-carousel/owl.theme.css" rel="stylesheet">

    <title>Tienda Web</title>
</head>

<body>
    <!--SPINNER-->
    <div class="spinner">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <h4>Cargando datos</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <p>Espere mientras carga la información</p>
                        <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <a href="">¿Necesitas ayuda?</a>
                </div>
            </div>
            <div id="menu" class="row">
                <div class="col-9">
                    <nav>
                        <ul>
                            <li><a href="<?=base_url?>">Inicio</a></li>
                            <?php $categorias = Utils::showCategory() ?>
                                <?php while($cat = $categorias->fetch_object()): ?>
                                    <li><a href="<?=base_url?>Producto/<?=str_replace(' ', '_',(Utils::quitar_tilde($cat->nombre)))?>"><?=$cat->nombre?></a></li>
                                <?php endwhile; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-3">
                    <?php if(isset($_SESSION['login'])):?>
                        <div class="login">
                            <div id="dropdown" class="dropdown float-left">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$_SESSION['login']->nombre?> 
                                    <?=$_SESSION['login']->apellidos?>
                                </button>
                                <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?=base_url?>Pedido/mis_pedidos">Mis pedidos</a>
                                    <a class="dropdown-item" href="<?=base_url?>Usuario/index">Mis datos</a>
                                    <?php if(isset($_SESSION['admin'])):?>
                                    <a class="dropdown-item" href="<?=base_url?>Categoria/crear">Administración</a>
                                    <?php endif;?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?=base_url?>Usuario/logout">Cerrar Sesión</a>
                                </div>
                            </div>
                            <?php $estado = Utils::stateCart() ?>
                            <div>
                                <?php $estado['count'] > 0 ? $color="green" : $color="white" ?>
                                <a class="cart" href="<?=base_url?>Carrito/index">Carrito <strong style="color:<?=$color?>">(<?=$estado['count']?>)</strong></a>
                            </div>
                        </div>
                    <?php elseif(!isset($_SESSION['login'])):?>
                        <nav class="nav_login">
                            <ul>
                                <li><a href="<?=base_url?>Usuario/login">Login</a></li>
                                <li><a href="<?=base_url?>Usuario/register">Registro</a></li>
                                <?php $estado = Utils::stateCart()?>
                            <li>
                                <?php $estado['count'] > 0 ? $color="green" : $color="white" ?>
                                <a href="<?=base_url?>Carrito/index">Carrito <strong style="color:<?=$color?>">(<?=$estado['count']?>)</strong></a>
                            </li>
                            </ul>
                        </nav>

                    <?php endif;?>
                </div>
            </div>
        </header>

        <!--Contenido de la página-->
        