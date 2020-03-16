<?php
session_start();

	include("header.php");
	include_once "Model/listadoChat.model.php";

	$idcliente    = $_REQUEST['idcliente'];
	$idconductor  = $_REQUEST['idconductor'];
	$idpedidoDeli = $_REQUEST['idpedidoDeli'];

	$list_chat = new ListadoChat();

	$delivery  = $list_chat->CantidadChatDelivery($idcliente);
	$num_delivery = $delivery->num_rows;

?>

<div class="container">
	
		<div id="mensaje"></div>
		
		<div class="row">
			<br>
			<a href="mensajesmenu.php?idcliente=<?php echo $idcliente;?>" title="" class="btn">Regresar</a>
			<h5>Tiene <?php echo $num_delivery; ?> pedidos pendientes</h5>
			<?php 

			$i =1;
			while ($fila = $delivery->fetch_array(MYSQLI_ASSOC)):
				//idchat, nombre,mensaje,fecha,idcliente,idconductor,idpedidoMov,idpedidoDeli,idpedidoRes,estado
			?>
    		<ul>
    			<li>
    			 	<?php echo $i.".- "; ?> DELIVERY <?php echo $fila['idpedidoDeli'];  ?><span> -----------</span>

					<a href="indexchatd.php?idcliente=<?php echo $idcliente;  ?>&idpedidoDeli=<?php echo $idpedidoDeli;  ?>&idconductor=<?php echo $idconductor;  ?>" title="" class="btn blue darken-4">Continuar</a>
    			</li>
    		</ul>
	
			<?php
			$i++;
			endwhile;
			?>
		</div>
</div>