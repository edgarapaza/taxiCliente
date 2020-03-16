<?php
session_start();

if(!empty($_SESSION['idcliente'])){

    include("header.php");
    require_once ("./Model/datoscliente.php");
    
    echo $idcliente = $_REQUEST['idcliente'];
    
    $datoscliente = new DatosCliente();
    $data = $datoscliente->Datos($idcliente);
    
?>

<div class="section no-pad-bot">
    <div class="center">
        <h5>Hola! <?php echo $data['nombres'];?> Gracias por preferirnos, siempre atentos</h5>
    	
        <style type="text/css">
        	.boton{
        		width: 90%;
        		height: 60px;
        		margin-bottom: 5px;
        	}
        </style>
        <a href="pedirMovilidad.php?idcliente=<?php echo $idcliente;?>" class="waves-effect waves-light btn-large orange boton">
        	<i class="material-icons left">directions_car</i>
        	Pedir Movilidad
        </a>
        
        <a href="pedirDelivery.php?idcliente=<?php echo $idcliente;?>" class="waves-effect waves-light btn-large blue-grey darken-1 boton">
			<i class="material-icons left">assignment</i>
        	Pedir Delivery
        </a>
        <a href="reserva.php?idcliente=<?php echo $idcliente;?>" class="waves-effect waves-light btn-large red boton">
        	<i class="material-icons left">airport_shuttle</i>
        	Reservar Movilidad
        </a>
        <hr>
    	<a href="mensajesmenu.php?idcliente=<?php echo $idcliente;?>" class="waves-effect waves-light btn-large blue boton">
            <i class="material-icons left">message</i>
            Ver mensajes
        </a>
        <!--
    	<a href="consultas.php" class="waves-effect waves-light btn-large olive boton">
        	<i class="material-icons left" disabled="true">contact_mail</i>
        	Consultas
    	</a>
    	
        <a href="emergencias.php" class="waves-effect waves-light btn-large pink lighten-2 boton">
        	<i class="material-icons left">alarm_on</i>
        	Emergencias
        </a>-->
         <a href="Controller/session_close.php?idcliente=<?php echo $idcliente;?>" class="waves-effect waves-light btn-large lighten-2 boton">
            <i class="material-icons left">exit</i>
            Salir
        </a>
		
    </div>
  </div>

<?php 
}else{
    header("Location:./index.html");
}
?>
