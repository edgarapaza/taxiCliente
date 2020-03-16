<?php
session_start();

	include("header.php");
	include_once "Model/listadoChat.model.php";
	
	$idcliente   = $_REQUEST['idcliente'];
	$idconductor = $_REQUEST['idconductor'];
	$idpedidoRes = $_REQUEST['idpedidoRes'];

	$list_chat = new ListadoChat();

	$reserva  = $list_chat->CantidadChatReserva($_SESSION['idcliente']);
	$num_reserva = $reserva->num_rows;

?>

<div class="container">

	<div id="mensaje"></div>
		
	<div class="row">
			<br>
			<a href="mensajesmenu.php?idcliente=<?php echo $idcliente;?>" title="" class="btn">Regresar</a>
			<h5>Tiene <?php echo $num_reserva; ?> pedidos pendientes</h5>
			<?php 

			$i =1;
			while ($fila = $reserva->fetch_array(MYSQLI_ASSOC)):
				//idchat, nombre,mensaje,fecha,idcliente,idconductor,idpedidoMov,idpedidoRes,idpedidoRes,estado
			?>
    		<ul>
    			<li>
    				<?php echo $i.".- "; ?> RESERVA DE MOVILIDAD <?php echo $fila['idpedidoRes'];  ?><span> -----------</span> 
    				
					<a href="indexchatr.php?idcliente=<?php echo $idcliente;  ?>&idpedidoRes=<?php echo $fila['idpedidoRes'];  ?>&idconductor=<?php echo $idconductor;  ?>" title="" class="btn blue darken-4">Continuar</a>
    			</li>
    		</ul>
	
			<?php
			$i++;
			endwhile;
			?>
	</div>

</div>