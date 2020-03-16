<?php
session_start();
if($_SESSION['conductor']){
	

	$codConductor = $_SESSION['conductor'];
	
	require_once "../Model/Listados.model.php";
	$listas = new Listas();
	$data = $listas->ServiciosAbiertosConductor($codConductor);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/pendientes.css">
	<title>No cerradas</title>
</head>
<body>
	<div class="header">
		<H3>Menu Conductor</H3>
		<div class="title">
			<span>*</span>
			<p class="subtitle">Lista de solicitudes pendientes</p>
			<span>
				<a href="menu.php">MENU</a>
			</span>
		</div>
	</div>

	<h2>Servicios Concluidos en este Mes</h2>

	<table class="table">
		<?php 
			while ($row = $data->fetch_array()) {
		 ?>
		<tr>
			<td>
				<?php printf("Dirección: %s (%s)", $row[2], $row[3]); ?>
			</td>
			
		</tr>
		<?php } ?>
	</table>
</body>
</html>
<?php 
}else{
	header('Location: index.html');
}
 ?>