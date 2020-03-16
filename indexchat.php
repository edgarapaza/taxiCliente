<?php
session_start();

$_SESSION['idcliente'];

include("Model/chat.model.php");

$idcliente   = $_REQUEST['idcliente'];
$idconductor = $_REQUEST['idconductor'];
$idpedidoMov = $_REQUEST['idpedidoMov'];

$_SESSION['myidconductor'] = $idconductor;
$_SESSION['myidpedidomov'] = $idpedidoMov;
$_SESSION['myidcliente']   = $idcliente;

$chatboot = new ChatBoot();

$data = $chatboot->MostrarChat($idconductor, $idpedidoMov, $idcliente);

if(isset($_POST['enviar']))
{
	if(!empty($_POST['nombre']) && !empty($_POST['mensaje']))
	{

		$nombre = trim(ucfirst($_POST['nombre']));
		$mensaje = trim(ucfirst($_POST['mensaje']));

		$res = $chatboot->GuardarChat($nombre,$mensaje,$idcliente,$idconductor,$idpedidoMov);
		
		if($res){
			echo "<embed src='beep.mp3' loop='false' hidden='true' autoplay='true'></embed>";

		}
	}else {
		echo "<script>M.toast({html: 'Debe escribir un mensaje!'})</script>";
	}
}




function formatearfecha($fecha){
	return date('g:i a', strtotime($fecha));
}
?>

<!DOCTYPE html>
<html lang="es-Es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  	<title>Taxi Seguro</title>
  
	<!-- CSS  -->
	<link rel="stylesheet" type="text/css" href="css/style_chat.css">
	  
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<script type="text/javascript">

		function ajax(){
      		var req = new XMLHttpRequest();

	      	req.onreadystatechange = function(){
		        if(req.readyState == 4 && req.status == 200){
		          document.getElementById('chat').innerHTML = req.responseText;
		        }
	      	}

	      	req.open('POST', 'datos_chat.php', true);
	      	req.send();
    	}

    	//refresh cada 1 segundo
    	setInterval(function(){ajax();}, 1000);
  	</script>
</head>

<body onload="ajax();">
	<nav class="light-blue lighten-1" role="navigation">
	    <div class="nav-wrapper container">
	    	<a id="logo-container" href="menu.php" class="brand-logo">
	      		<img src="images/logo.png" alt="Yatzil" class="responsive-img" width="80">
	    	</a>
		    <ul class="right hide-on-med-and-down">
		        <li><a href="menu.php">Inicio</a></li>
		        <li><a href="indexchat.php">Mostrar Chat</a></li>
		    </ul>

	      	<ul id="slide-out" class="sidenav">
	        	<li>
	        		<div class="user-view">
			          <div class="background">
			            <img src="images/office.jpg">
			          </div>
			          <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
			          <a href="#name"><span class="white-text name"><?php echo $_SESSION['nombre']; ?></span></a>
			          <a href="#email"><span class="white-text email">Telefono: <?php echo $_SESSION['telefono']; ?></span></a>
			      	</div>
			    </li>
		        <li><a href="indexchat.php"><i class="material-icons">cloud</i>Mostrar chat</a></li>
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

	<a href="menu.php" title="#" class="btn blue" id="">Regresar al Menu</a> 
	
	<a href="chatMovilidad.php?idcliente=<?php echo $idcliente;?>&idpedidoMov=<?php echo $idpedidoMov;?>&idconductor=<?php echo $idconductor;?>" title="#" class="btn red" id="">Lista de Conversaciones</a>
	
	<div id="contenedor">
		<div id="caja-chat">

			<div id="chat">
			</div>
			
		</div>
		
		<form action="" method="post" id="chat-form">
			
			<input type="hidden" name="idcliente"   value="<?php echo $idcliente; ?>">
			<input type="hidden" name="idconductor" value="<?php echo $idconductor; ?>">
			<input type="hidden" name="idpedidoMov" value="<?php echo $idpedidoMov; ?>">
			<input type="hidden" name="nombre" value="<?php echo $_SESSION['nombre']; ?>">
			
			<label for="">Mensaje:</label>
			<input type="text" name="mensaje" required="required" id="caja-texto">
			<button type="submit" name="enviar" class="btn">Enviar</button>


		</form>
	</div>


	<audio src='beep.mp3' preload='auto' autoplay='true' hidden="true" controls></audio>
   <!--  Scripts   -->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/acciones.js"></script>

  <script>
    $(document).ready(function(){
       $('.sidenav').sidenav();
    });
  </script>

  </body>
</html>
