<?php require_once 'views/usuario/login.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/styles.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/responsive.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/css/content.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/iconos/style.css?v=<?php echo(rand()); ?>">

    <!--Slider-->
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/owl-carousel/assets/owl.carousel.min.css?v=<?php echo(rand()); ?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url?>assets/owl-carousel/assets/owl.theme.default.min.css?v=<?php echo(rand()); ?>">

    <title>Tienda Web</title>
</head>

<body class="barra">
    <!--SPINNER-->
    <div class="spinner">
    <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
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
                <div id="logo" class="col-4 col-sm-6 col-xl-4">
                    <a href="<?=base_url?>">
                        <img src="<?=base_url?>assets/img/logo_ib_sin_fondo.png">    
                        <span>Tienda Web</span>
                    </a>
                </div>
                <div class="col-4 prueba">
                    <div class="envio">
                        <p>Gastos de envío <strong>Gratuitos</strong> para la ciudad local</p>
                    </div>
                </div>
                <div class="col-8 col-sm-6 col-xl-4">
                    <!--SECCION LOGIN-->
                    <div class="login">
                        <?php $estado = Utils::stateCart()?>
                            <?php $estado['count'] > 0 ? $color="green" : $color="red" ?>
                            <div class="icono-cart">
                                <a href="<?=base_url?>Carrito/index">
                                    <div class="cart">
                                        <span class="icon-cart"></span>
                                        <span class="cart-unit" style="background-color:<?=$color?>"><?=$estado['count']?></span>
                                    </div>
                                </a>
                            </div>
                            
                        <?php if(!isset($_SESSION['login'])):?>
                            
                            <div class="saludo">
                                <p>Hola, Bienvenid@</p>
                                <span class="btn-login" type="button">Inicia sesión o regístrate</span>
                            </div>
                            <div class="icono-login">
                                <span class="icon-user-o btn-login" type="button"></span>
                            </div>
                        <?php elseif(isset($_SESSION['login'])):?>
                            
                            <div class="saludo">
                                <p>Hola, <?=$_SESSION['login']->nombre?></p>
                                <a href="<?=base_url?>Usuario/index">Mi cuenta</a> 
                                <a href="<?=base_url?>Usuario/logout">Cerrar Sesión</a>
                            </div>
                            <div class="icono-login">
                                <span class="icon-user-o"></span>
                            </div>
                        <?php endif;?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row menu">
                <div class="col-4 col-sm-6 col-lg-9">
                    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2b2f33;">
                        <!--Boton responsive-->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href="<?=base_url?>">Inicio</a></li>
                                <?php $categorias = Utils::showCategory() ?>
                                <?php while($cat = $categorias->fetch_object()): ?>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url?>Producto/<?=str_replace(' ', '_',(Utils::quitar_tilde($cat->nombre)))?>"><?=$cat->nombre?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-8 col-sm-6 col-lg-3">
                    <div class="menu-right">
                        <ul>
                        <?php if(isset($_SESSION['login'])):?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon-user"></span>
                                    <?=$_SESSION['login']->nombre?> 
                                    <?=$_SESSION['login']->apellidos?>
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?=base_url?>Pedido/mis_pedidos">Mis pedidos</a>
                                    <a class="dropdown-item" href="<?=base_url?>Usuario/index">Mis datos</a>
                                    <?php if(isset($_SESSION['admin'])):?>
                                    <a class="dropdown-item" href="<?=base_url?>Categoria/crear">Administración</a>
                                    <?php endif;?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?=base_url?>Usuario/logout">Cerrar Sesión</a>
                                </div>
                            </li>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </header>

        <!--Contenido de la página-->
        