<?php 
include "../Model/Conductor.model.php";

$idconductor   = trim(strtoupper($_REQUEST['idconductor']));
$nombres       = trim(strtoupper($_REQUEST['Nombres']));
$apellidos     = trim(strtoupper($_REQUEST['Apellidos']));
$dni           = trim(strtoupper($_REQUEST['DNI']));
$telefono      = trim(strtoupper($_REQUEST['Telefono']));
$email         = trim(strtolower($_REQUEST['email']));
$direccion     = trim(strtoupper($_REQUEST['Direccion']));
$numlicencia   = trim(strtoupper($_REQUEST['NumLicencia']));
$fecnacimiento = trim(strtoupper($_REQUEST['FechaNacimiento']));
$foto          = trim(strtolower($_REQUEST['Foto']));

$conductor = new Conductor();
$conductor->NuevoConductor($idconductor,$nombres,$apellidos,$dni,$telefono,$email,$direccion,$numlicencia,$fecnacimiento,$foto);
