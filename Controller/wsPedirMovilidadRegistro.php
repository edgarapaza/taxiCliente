<?php
session_start();
require_once "../Model/pedido.model.php";

$pedidos = new Pedidos();

if(!empty($_POST['idcliente']) && !empty($_POST['direccion']) && !empty($_POST['tipounidad']))
	{
		
		$idcliente  = trim(strtoupper($_POST['idcliente']));
		$direccion  = trim(strtoupper($_POST['direccion']));
		$referencia = trim(strtoupper($_POST['referencia']));
		$otro       = trim(strtoupper($_POST['otros']));
		$tipounidad = trim(strtoupper($_POST['tipounidad']));
	

		$pedidos->SolicitarMovilidad($idcliente,$direccion,$referencia,$otro,$tipounidad);
}

header("Location: ../mensajesmenu.php?idcliente=".$idcliente);