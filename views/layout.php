
<?php

    //Solo si la sesion aun no estaba arrancada, por algun otro archivo, entonces la arrancamos aqui
    if(!isset($_SESSION)){
        session_start();
    }
    $auth=$_SESSION['login'] ?? false;
    if(!isset($inicio)){
        $inicio=false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>


<header class="header <?php echo  $inicio ? 'inicio': ''; ?>"> <!--Evaluamos si inicio esta definido, agregamos el texto inicio-->
    <div class="contenedor contenido-header">
        <div class="barra">
            <a href="../../index.php"> <!--Va hacia la pagina principal-->
                <img src="../../build/img/logo.svg" alt="logotipo De bienes raices">
            </a>

            <div class="mobile-menu">
                <img src="../../build/img/barras.svg" alt="icono menu barras">
            </div>

            <div class="derecha">
                <img class="dark-mode-boton" src="../../build/img/dark-mode.svg">
                <nav class="navegacion">
                    <a href="../../nosotros.php">Nosotros</a>
                    <a href="../../anuncios.php">Anuncios</a>
                    <a href="../../blog.php">Blog</a>
                    <a href="../../contacto.php">Contacto</a>
                    <?php if ($auth):?>
                        <a href="../cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div> <!--.barra-->
        </div>
        <?php echo $inicio ? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>' : '' ?>
    </div>
</header>

    <?php
        echo $contenido;
    ?>

<footer class="footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion">
            <a href="nosotros.php">Nosotros</a>
            <a href="anuncios.php">Anuncios</a>
            <a href="blog.php">Blog</a>
            <a href="contacto.php">Contacto</a>
        </nav>
    </div> <!--.contenedor footer-->



    <p class="copyright">Todos los derechos reservados <?php echo date('Y')?>&copy;</p>
</footer>

    <script src="../build/js/bundle.js"></script>