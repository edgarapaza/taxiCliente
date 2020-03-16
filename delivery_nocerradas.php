<?php
session_start();
if($_SESSION['conductor']){
	
	$codConductor = $_SESSION['conductor'];
	
	require_once "../Model/Listados.model.php";
	$listas = new Listas();
	$data = $listas->SoloDelivery($codConductor);

	include "header.php";

	$i=1;

	//<link rel="stylesheet" href="css/pendientes.css">
?>
	
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	
	
	<script>
		
		function Revisar(codigo){
			
			$.ajax({
				url: '../Controller/cerrarDelivery.php',
				type: 'post',
				dataType: 'html',
				data: {iddelivery: codigo},
				success: function(res){
					//$("#mensaje").html(res);
					M.toast({html: 'Servicio cerrado correctamente'});
					setTimeout(function(){// wait for 5 secs(2)
				        location.reload(); // then reload the page.(3)
				    }, 3000);
				},
				error: function(){
					M.toast({html: 'Error al cerrar sesion'})
				}
			});
			
		}
				
	</script>


	<div class="container-fluid">
		<div class="row teal darken-2">
			<div class="col l6 s12">
				<span class="white-text">Menu Conductor: <span class="green"><?php echo $codConductor; ?></span></span>
				<a href="menu.php" class="btn orange">MENU</a>
			</div>
		</div>
	</div>


	<div class="row">
	      <div class="col s12">
	      	<h4>Deliverys</h4>
			<table class="table green">
				<thead>
					<tr>
						<td>Num.</td>
						<td>Direccion y Pedido</td>
						<td>Opciones</td>
					</tr>
				</thead>
				<?php 
					while ($row = $data->fetch_array(MYSQLI_ASSOC)) {
				 ?>
				<tr>
					<td><?php echo $i;?></td>
					
					<td>
						<input type="hidden" name="idpedir" id="idpedir" value="<?php echo $row[0]; ?>">
						<?php printf("Delivery: %s - %s (%s)", $row['delivery'], $row['direccion'], $row['referencia']); ?>
					</td>
					<td>
						<a onclick="Revisar(<?php echo $row['iddelivery']; ?>);" class="btn">Cerrar Sesion</a>
					</td>
				</tr>
				<?php $i++; } ?>
			</table>
	      </div>
	      
	</div>
	
<?php 
	include "inc/footer.php";

}else{
	header('Location: index.html');
}
 ?>
