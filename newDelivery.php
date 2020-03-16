<?php
session_start();
if($_SESSION['conductor']){
	
	$codConductor = $_SESSION['conductor'];
	
	require_once "../Model/ListaPendientes.model.php";

	$pendientes = new ListaPendientes();
	
	$datos = $pendientes->MostrarLista2();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Nuevas Solicitudes</title>
	<link rel="stylesheet" href="css/solicitudes.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
</head>
<body>
	<div class="header">
		<div class="title">
		
			<p class="subtitle">Lista de Delivery</p>
			<span><?php echo $codConductor; ?></span>
			<span>
				<a href="menu.php" class="mimenu">MENU</a>
			</span>
		</div>
	</div>

	<?php 
		while ($row = $datos->fetch_array(MYSQLI_ASSOC)) {
	?>
	<div class="content-pedidos">
		<div class="pedido_imagen">
			<div class="movilidad">Mov</div>
			<span class="etiqueta"><?php echo $row[1]; ?></span>
		</div>
		<div class="pedidos_detalles">
			<span class="etiqueta">Direccion:</span>
			<p><?php echo $row['direccion']; ?></p>
			<span class="etiqueta">Pedido:</span>
			<p><?php echo $row['delivery']; ?></p>
			<span class="etiqueta">Referencia:</span>
			<p><?php echo $row['referencia']; ?></p>
			<p>
				<a href="../Control/aceptar.control.php?idpedir=<?php echo $row[0]; ?>&idauto=<?php echo $codConductor;?>" class="boton-principal">Aceptar servicio</a>
			</p>
		</div>
	</div>

	<?php } ?>
	
</body>
</html>	
<?php 
}else{
	header("../public/index.html");
}
?>

