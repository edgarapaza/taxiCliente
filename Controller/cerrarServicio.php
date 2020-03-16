<?php 
require_once "../Model/Acciones.model.php";

$idpedir = $_REQUEST['idpedir'];

$acciones = new Acciones();
#$acciones->AceptarSolicitud('43','M15');
$acciones->CerrarServicio($idpedir);

#
header("Location: ../public/nocerradas.php");