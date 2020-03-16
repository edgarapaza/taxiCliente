<?php
session_start();
require_once("../Model/validacion.model.php");

$validacion = new Validacion();

$telefono = trim($_POST['telefono']);
$passwd   = trim(strtolower($_POST['passwd']));

$data = $validacion->ValidacionCliente($telefono, $passwd);		

if(!empty($data['idcliente'])){
	echo $_SESSION['idcliente'] = $data['idcliente'];
	echo $_SESSION['nombre']   = $data['nombre'];
	echo $_SESSION['telefono']  = $data['telefono'];

	header("Location: ../menu.php?idcliente=".$data['idcliente']);
}else{
	
	header("Location: ../index.html");
}
