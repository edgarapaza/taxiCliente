<?php
session_start();
	include("header.php");
	include_once "Model/listadoChat.model.php";

	
	$nombreCliente = $_SESSION['nombre'];
	$telefono      = $_SESSION['telefono'];

	$idcliente   = $_REQUEST['idcliente'];
	$idpedidoMov = $_REQUEST['idpedidoMov'];
	$idconductor = $_REQUEST['idconductor'];

	$list_chat = new ListadoChat();

	$movilidad  = $list_chat->CantidadChatMovilidad($idcliente);
	$num_movilidad = $movilidad->num_rows;

?>

<div class="container">
		<div id="mensaje"></div>
		
		<div class="row">
			<br>
			<a href="mensajesmenu.php?idcliente=<?php echo $idcliente;?>" title="" class="btn">Regresar</a>
			<h5>Tiene <?php echo $num_movilidad; ?> pedidos pendientes</h5>
			<?php 

			$i =1;
			while ($fila = $movilidad->fetch_array(MYSQLI_ASSOC)):
				
			?>
    		<ul>
    			<li>
    				<?php echo $i.".- "; ?> MOVILIDAD <?php echo $fila['idpedidoMov'];  ?><span> -----------</span>
					
					<a href="indexchat.php?idcliente=<?php echo $idcliente;?>&idpedidoMov=<?php echo $fila['idpedidoMov'];?>&idconductor=<?php echo $idconductor;?>" title="" class="btn blue darken-4">Continuar</a>

    			</li>
    		</ul>
	
			<?php
			$i++;
			endwhile;
			?>
		</div>
</div>	