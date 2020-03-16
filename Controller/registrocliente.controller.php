<?php
require_once("../Model/registroCliente.model.php");

$registro = new Registro();

	$nombres   = trim(strtoupper($_POST['nombre']));
	$apellidos = trim(strtoupper($_POST['apellidos']));
	$telefono  = trim($_POST['telefono']);
	$email     = trim(strtolower($_POST['correo']));
	$dni       = trim($_POST['dni']);
	$ciudad    = trim(strtoupper($_POST['ciudad']));
	$passwd   = trim(strtolower($_POST['passwd1']));


$res = $registro->RegistroCliente($nombres,$apellidos,$telefono,$email,$dni,$ciudad,$passwd);

echo "Mi respuesta: ".$res;
if($res = "DUPLICADO"){
	header("Location: ../error.html");
}else{
	header("Location: ../index.html");	
}