<?php 
session_start();
if(!empty($_SESSION['idcliente'])){
	include("header.php");
?>

<div class="container">
		<em class="">Pedir movilidad: <?php echo $_SESSION['nombre']; ?></em>
		<div id="mensaje"></div>
		
		<div class="row">

			<form action="Controller/wsPedirMovilidadRegistro.php" method="post" id="PedirMovilidad-form" class="col s12">
				<input type="hidden" name="idcliente" placeholder="id cliente" value="<?php echo $_SESSION['idcliente'];?>" required="required" />
				<div class="row">
			        <div class="col s12">
			          <input type="text" name="direccion" placeholder="Direccion" id="direccion"  class="validate" required="required" />
			        </div>
			    </div>

			    <div class="row">
			        <div class="col s12">
			          <input type="text" name="referencia" placeholder="Referencia" id="referencia"  class="validate" required="required" />
			        </div>
			    </div>

			    <div class="row">
			        <div class="col s12">
			          <input type="text" name="otros" placeholder="Otros" id="otros"  class="validate" />
			          
			        </div>
			    </div>

			    <div class="row">
			        <div class="col s6">
			        	<label for="">Tipo de Movilidad</label>
					    <select name="tipounidad" id="tipounidad" class="browser-default">
							<option value="0" selected="selected">[Seleccione]</option>
							<option value="Normal">Normal</option>
							<option value="Ejecutivo">Ejecutivo</option>
							<option value="Unidad de Carga">Unidad de Carga</option>
						</select>
						
			        </div>
			    </div>

				<button type="submit" id="btnPedirMovilidad1" name="btnPedirMovilidad1" class="btn">Pedir Movilidad</button>
			</form>
		</div>
</div>

<?php	
}else{
	header("Location: index.html");
}
?>