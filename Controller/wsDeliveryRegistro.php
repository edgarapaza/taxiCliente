<?php
include("../Model/pedido.model.php");

$pedidos = new Pedidos();


if(!empty($_POST["idcliente"]) && !empty($_POST["direccion"]) && !empty($_POST["referencia"]) && !empty($_POST['delivery']))
{
	$idcliente  = trim(strtoupper($_POST['idcliente']));
	$direccion  = trim(strtoupper($_POST['direccion']));
	$referencia = trim(strtoupper($_POST['referencia']));
	$delivery   = trim(strtoupper($_POST['delivery']));
	$otro       = trim(strtoupper($_POST['otro']));

	#echo $idcliente ."<br>";
	#echo $direccion ."<br>";
	#echo $referencia."<br>";
	#echo $delivery  ."<br>";
	#echo $otro      ."<br>"; 
	

	$pedidos->SolicitarDelivery($idcliente,$direccion,$referencia,$delivery,$otro);
}

header("Location: ../mensajesmenu.php?idcliente=".$idcliente);