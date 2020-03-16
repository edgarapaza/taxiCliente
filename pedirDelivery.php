<?php
session_start();
if(!empty($_SESSION['idcliente'])){
include("header.php"); 


?>

<div class="container">
		<div id="mensaje"></div>
		
		<div class="row">
			<h5>Solicitar Delivery</h5>
			<form action="" method="post" id="delivery-form">
				<input type="hidden" name="idcliente" placeholder="id cliente" value="<?php echo $_SESSION['idcliente']; ?>">
				<input type="text" name="direccion" placeholder="Direccion">
				<input type="text" name="referencia" placeholder="Referencia">
				<label for="">Descripcion del Delivery</label>
				<textarea name="delivery" placeholder="Datos del delivery"></textarea>
				
				<input type="text" name="otro" placeholder="Otros datos del pedido">
				
				<button type="button" id="btnDelivery" class="btn">Enviar pedido Delivery</button>
			</form>
		</div>
</div>

<?php 
include("footer.php"); 
}else{
	header("Location: index.html");
}
?>

