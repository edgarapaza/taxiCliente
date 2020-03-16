<?PHP
require("../Model/pedido.model.php");

$pedidos = new Pedidos();

if(!empty($_POST['idcliente']) && !empty($_POST['direccion']) && !empty($_POST['referencia']) && !empty($_POST['horareserva'])){

	$idcliente   = trim(strtoupper($_POST['idcliente']));
	$direccion   = trim(strtoupper($_POST['direccion']));
	$referencia  = trim(strtoupper($_POST['referencia']));
	$horareserva = trim(strtoupper($_POST['horareserva']));
	$otro        = trim(strtoupper($_POST['otro']));
	
	echo $idcliente .'<br>';
	echo $direccion .'<br>';
	echo $referencia.'<br>';
	echo $horareserva.'<br>';
	echo $otro      .'<br>'; 
	
	
	$pedidos->SolicitarReserva($idcliente,$direccion,$referencia,$horareserva,$otro);
}			

header("Location: ../mensajesmenu.php?idcliente=".$idcliente);