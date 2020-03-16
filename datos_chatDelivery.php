<?php
session_start();
include("Model/chat.model.php");

$_SESSION['myidcliente'];
$_SESSION['myidconductor'];
$_SESSION['myidpedidodeli'];

$chatboot = new ChatBoot();
$data = $chatboot->MostrarChatDelivery($_SESSION['myidconductor'], $_SESSION['myidpedidodeli'], $_SESSION['myidcliente']);

function formatearfecha($fecha){
	return date('g:i a', strtotime($fecha));
}

while ($fila2 = $data->fetch_array(MYSQLI_ASSOC)):	    
?>
<div id="datos-chat">
	
	<span style="color: #1c62c4;"><?php echo $fila2['nombre']; ?>: </span>
	<span style="color: #848484;"><?php echo $fila2['mensaje']; ?></span>
	<span style="float: right;"><?php echo formatearfecha($fila2['fecha']); ?></span>
	
</div>
<?php endwhile; ?>