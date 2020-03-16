<?php 
session_start();
if(!empty($_SESSION['idcliente'])){
	include("header.php");
?>

<div class="container">
		<em class="">Reserva de movilidad: <?php echo $_SESSION['nombre']; ?></em>
		<div id="mensaje"></div>
		
		<div class="row">
		
			<form action="Controller/wsReservaRegistro.php" method="post" id="reserva-form">
				<input type="hidden" name="idcliente" placeholder="id cliente" value="<?php echo $_SESSION['idcliente'];?>" required="required" />

				<input type="text" name="direccion" placeholder="Direccion">
				<input type="text" name="referencia" placeholder="Referencia">
				<label for="">Hora de Reserva</label>
				<input type="time" name="horareserva" placeholder="Hora reserva">
				<input type="text" name="otro" placeholder="otros">
				
				<button type="submit" class="btn" id="btnReservaMovilidad">Solicitar Reserva de Movilidad</button>
			</form>
		</div>
</div>

<?php	
}else{
	header("Location: index.html");
}
?>