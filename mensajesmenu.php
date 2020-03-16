<?php 
session_start();

if(!empty($_SESSION['idcliente'])){
	
	$idcliente     = $_REQUEST['idcliente'];
	$nombreCliente = $_SESSION['nombre'];
	$telefono      = $_SESSION['telefono'];
    

    include "header.php";
    include_once "Model/listadoChat.model.php";

    $list_chat = new ListadoChat();
    $movilidad = $list_chat->CantidadChatMovilidad($idcliente);
    $delivery  = $list_chat->CantidadChatDelivery($idcliente);
    $reserva   = $list_chat->CantidadChatReserva($idcliente);
    
?>


<div class="section no-pad-bot">
    <div class="center">
        <h5>Hola: <?php echo $nombreCliente; ?>, puedes ver los mensajes.</h5>
        <br>
        <a href="menu.php?idcliente=<?php echo $idcliente;?>" title="" class="btn orange">REGRESAR</a>
        <h5>Menu de mensajes</h5>
        
        <!-- PARA EL ITEM 1 -->
        <?php 
        if($movilidad)
        {
            $num_movilidad = $movilidad->num_rows;
            $datamovilidad  = $list_chat->ChatMovilidad($idcliente);
            $fila = $datamovilidad->fetch_array(MYSQLI_ASSOC);
            

            ?>
            <a href="chatMovilidad.php?idcliente=<?php echo $idcliente;?>&idpedidoMov=<?php echo $fila['idpedidoMov'];?>&idconductor=<?php echo $fila['idconductor']; ?>" class="waves-effect waves-light btn-large orange boton">
            <?php echo $num_movilidad; ?>
                Mensajes Pedir Movilidad
            </a>
            <?php    
        }else{
            $num_movilidad =0;
        }
         ?>
        
        <!-- PÁRA EL ITEM 2-->
        <?php 
            if($delivery)
            {
                $num_delivery = $delivery->num_rows;
                $datadelivery  = $list_chat->ChatDelivery($idcliente);
                $fila2 = $datadelivery->fetch_array(MYSQLI_ASSOC);
                
        ?>
        <a href="chatDelivery.php?idcliente=<?php echo $fila2['idcliente'];?>&idpedidoDeli=<?php echo $fila2['idpedidoDeli'];?>&idconductor=<?php echo $fila2['idconductor']; ?>" class="waves-effect waves-light btn-large blue-grey darken-1 boton">
            <?php echo $num_delivery; ?>
            Mensajes Pedir Delivery
        </a>

        <?php        
            }else{
                $num_delivery =0;
            }
        ?>
        
        <!-- para el item 3-->
        <?php 
        if($reserva){
            $num_reserva = $reserva->num_rows;
            $num_delivery = $delivery->num_rows;

            $dataReserva  = $list_chat->ChatReserva($idcliente);
            $fila3 = $dataReserva->fetch_array();
            
        ?>

        <a href="chatReserva.php?idcliente=<?php echo $fila3['idcliente'];?>&idpedidoRes=<?php echo $fila3['idpedidoRes'];?>&idconductor=<?php echo $fila3['idconductor']; ?>" class="waves-effect waves-light btn-large pink darken-1 boton">
            <?php echo $num_reserva; ?>
            Mensajes Reservar Movilidad
        </a>

        <?php
        }else{
            $num_reserva =0;
        }

        ?>

        
    </div>
</div>

<?php 


}
else{
	header("Location: index.html");
} ?>