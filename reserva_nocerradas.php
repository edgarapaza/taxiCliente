<?php
session_start();
if($_SESSION['conductor']){
	
	$codConductor = $_SESSION['conductor'];
	
	require_once "../Model/Listados.model.php";
	$listas = new Listas();
	$data = $listas->SoloReservas($codConductor);

	include "inc/header.php";

	$i=1;

	//<link rel="stylesheet" href="css/pendientes.css">
?>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	<script>
		
		function Revisar(codigo){
			
			$.ajax({
				url: '../Controller/cerrarReserva.php',
				type: 'post',
				dataType: 'html',
				data: {idreserva: codigo},
				success: function(res){
					$("#mensaje").html(res);
					M.toast({html: 'Reserva cerrado correctamente'});
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
		<div class="row pink darken-1">
			<div class="col l6 s12">
				<span class="white-text">Menu Conductor: <span class="green"><?php echo $codConductor; ?></span></span>
				<a href="menu.php" class="btn orange">MENU</a>
			</div>
		</div>
	</div>

	<hr>


	<div class="row">
		<div class="col s12">
      		<h4>Reservas</h4>

			<table class="table pink darken-1 white-text">
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
						<input type="hidden" name="idreserva" id="idreserva" value="<?php echo $row['idreserva']; ?>">
						<?php printf("Hora: %s - %s (%s)", $row['hora'], $row['direccion'], $row['referencia']); ?>
					</td>
					<td>
						<a onclick="Revisar(<?php echo $row['idreserva']; ?>);" class="btn red">Cerrar Sesion</a>
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
