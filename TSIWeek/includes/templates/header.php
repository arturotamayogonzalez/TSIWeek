<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'invitados' || $pagina == 'index'){
        echo '<link rel="stylesheet" href="css/colorbox.css">';
    }else if($pagina == 'galeria'){
        echo '<link rel="stylesheet" href="css/lightbox.css">';

    }
  ?>
  <link rel="stylesheet" type="text/css" href="css/main.css?<?php echo date('l js \of F Y h:i:s A'); ?>"/> 
  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">

      <nav class="redes-sociales">
          <a href="https://www.facebook.com/Licenciatura-en-Tecnolog%C3%ADas-y-Sistemas-de-Informaci%C3%B3n-UAM-Cuajimalpa-271221536242/"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com/TSIUAMC"><i class="fab fa-twitter"></i></a>
          <a href="https://www.youtube.com/channel/UCfSv7JphGxXQkrcq87vjvbQ"><i class="fab fa-youtube"></i></a>
          <a href="https://www.instagram.com/uamdccd/"><i class="fab fa-instagram"></i></a>
        </nav>

        <div class="informacion-evento">

          <div class="contenedor clearfix">
              <p class="fecha"><i class="fas fa-calendar-alt"></i> 15-19 Julio</p>
              <br>
              <p class="ciudad"><i class="fas fa-map-marker-alt"></i> CDMX, UAM Cuajimalpa</p>
          </div>

          <h1 class="nombre-sitio">TSI WEEK</h1>
          <p class="slogan">La mejor semana de <span>Tecnologias y Sistemas de la Información</span></p>
        </div><!--Informacion evento-->
      </div>
    </div> <!--.hero-->
  </header>


  <div class="barra">
    <div class="contenedor clearfix">

      <div class="logo">
        <a href="index.php"><h5 class="letras-logo">T S I W E E K</h5></a>
      </div>

      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal">
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="galeria.php">Galeria</a>
        <a href="registro.php">Registro</a>
      </nav>

    </div> <!--Contenedor-->
  </div> <!--Barra-->
