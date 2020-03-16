<?php
session_start();
include("Model/chat.model.php");

$_SESSION['myidconductor'];
$_SESSION['myidpedidomov'];
$_SESSION['myidcliente'];


$chatboot = new ChatBoot();
$data = $chatboot->MostrarChat($_SESSION['myidconductor'],$_SESSION['myidpedidomov'], $_SESSION['myidcliente']);

function formatearfecha($fecha){
	return date('g:i a', strtotime($fecha));
}

while ($fila = $data->fetch_array(MYSQLI_ASSOC)):
?>
<div id="datos-chat">
	
	<span style="color: #1c62c4;"><?php echo $fila['nombre']; ?>: </span>
	<span style="color: #848484;"><?php echo $fila['mensaje']; ?></span>
	<span style="float: right;"><?php echo formatearfecha($fila['fecha']); ?></span>
	
</div>
<?php endwhile; ?>