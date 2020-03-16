<?php 
require_once "../Model/Acciones.model.php";

$idpedidoMov = $_REQUEST['idpedidoMov'];
$idconductor = $_REQUEST['idconductor'];

$acciones = new Acciones();
$acciones->AceptarSolicitud($idpedidoMov, $idconductor);

header("Location: ../public/newSolicitudes.php");
?>