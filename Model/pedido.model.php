<?php
require_once("Conexion.php");

class Pedidos
{
    private $conn;

    public function __construct()
    {
    	$link = new Conexion();
    	$this->conn= $link->Conectar();   
    	return $this->conn;
    }

    public function SolicitarMovilidad($idcliente,$direccion,$referencia,$otro,$tipounidad)
    {
    	$fecPedido = date('Y-m-d H:i:s');

    	$sql = "INSERT INTO pedirmovilidad (idpedirmovilidad,idcliente,idconductor,direccion,referencia,otro,tipouni,fecPedido,estado,fecTermino,calificacion,aceptado,fecAceptado) VALUES (null,'$idcliente','0','$direccion','$referencia','$otro','$tipounidad','$fecPedido','1',null,'0','0',null);";

    	if(!$this->conn->query($sql))
    	{
    		echo "Error Pedir Movilidad: " . mysqli_error($this->conn);
    		exit();
    	}

        $mensaje = "Solicita Movilidad:" .$direccion ."(".$referencia.")";
        $sql2 = "INSERT INTO chat (idchat,nombre,mensaje, fecha, idcliente, idconductor) VALUES (null,'$nombreCliente','$mensaje','$fecPedido','$idcliente',0);";

        if(!$this->conn->query($sql2)){
            echo "Error chat: " . mysqli_error($this->conn);
            exit();
        }

        mysqli_close($this->conn);

    }

    public function SolicitarDelivery($idcliente,$direccion,$referencia,$delivery,$otro)
    {
        $fecPedido = date('Y-m-d H:i:s');
    	$sql = "INSERT INTO pedirdelivery VALUES (null,'$idcliente','0','$direccion','$referencia','$delivery','$otro','$fecPedido','1',null,'0','0',null);";

    	if(!$this->conn->query($sql))
    	{
    		echo "Error Pedir Movilidad: " . mysqli_error($this->conn);
    		exit();
    	}

    	mysqli_close($this->conn);
    }

    public function SolicitarReserva($idcliente,$direccion,$referencia,$hora,$otro)
    {

        $fecPedido = date('Y-m-d H:i:s');

    	$sql = "INSERT INTO reservar VALUES (null,'$idcliente','0','$direccion','$referencia','$hora','$otro','$fecPedido','1',null,'0','0',null);";

    	if(!$this->conn->query($sql))
    	{
    		echo "Error Pedir Movilidad: " . mysqli_error($this->conn);
    		exit();
    	}
        
        mysqli_close($this->conn);
    }
}