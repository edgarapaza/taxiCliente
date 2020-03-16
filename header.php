<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="Googlebot-News" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="robots" content="noindex, nofollow">
  <meta name="robots" content="noimageindex">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Taxi Seguro</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
</head>
<body">

  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="menu.php" class="brand-logo">
      <img src="images/logo.png" alt="Yatzil" class="responsive-img" width="80">
    </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="menu.php">Inicio</a></li>
        <li><a href="indexchat.php">Mostrar Chat</a></li>
      </ul>

      <ul id="slide-out" class="sidenav">
        <li><div class="user-view">
          <div class="background">
            <img src="images/office.jpg">
          </div>
          <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
          <a href="#name"><span class="white-text name"><?php echo $_SESSION['nombre']; ?></span></a>
          <a href="#email"><span class="white-text email">Telefono: <?php echo $_SESSION['telefono']; ?></span></a>
        </div></li>
        <li><a href="indexchat.php"><i class="material-icons">cloud</i>Mostrar Chat</a></li>
        <li><a href="pedirMovilidad.php">Solicitar Movilidad</a></li>
        <li><a href="pedirDelivery.php">Pedir Devilevry</a></li>
        <li><a href="reserva.php">Reserva Movilidad</a></li>
        <li><div class="divider"></div></li>
        <li><a href="Controller/session_close.php">Salir</a></li>
        
        <li><div class="divider"></div></li>
        <li><a href="config.php">Configuraciones de Cuenta</a></li>
      </ul>
     
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>

