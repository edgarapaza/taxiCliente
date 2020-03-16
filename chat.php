<?php

include("Model/chat.model.php");

$chatboot = new ChatBoot();

if(isset($_POST['enviar']))
{
	$nombre = trim(ucfirst($_POST['nombre']));
	$mensaje = trim(ucfirst($_POST['mensaje']));

	$res = $chatboot->GuardarChat($nombre,$mensaje);

	if($res){
		echo "<embed src='beep.mp3' loop='false' hidden='true' autoplay='true'></embed>";
	}
}


$data = $chatboot->MostrarChat();

function formatearfecha($fecha){
	return date('g:i a', strtotime($fecha));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/style_chat.css">
</head>
<body>
	
	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat">
				<?php 
				
					while ($fila = $data->fetch_array(MYSQLI_ASSOC)):
					    
				?>
				<div id="datos-chat">
					
					<span style="color: #1c62c4;"><?php echo $fila['nombre']; ?>: </span>
					<span style="color: #848484;"><?php echo $fila['mensaje']; ?></span>
					<span style="float: right;"><?php echo formatearfecha($fila['fecha']); ?></span>
					
				</div>
				<?php endwhile; ?>
			</div>

			
			<form action="" method="post" >
				
				<label for="">Nombre:</label>
				<input type="text" name="nombre">
				<textarea name="mensaje" cols="40">
					
				</textarea>
				<button type="submit" name="enviar">Enviar</button>
			</form>
		</div>
	</div>

</body>
</html>