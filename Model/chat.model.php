<?php 
require_once("Conexion.php");

class ChatBoot
{
    private $conn;

    public function __construct()
    {
    	$link = new Conexion();
    	$this->conn= $link->Conectar();   
    	return $this->conn;
    }

    public function GuardarChat($nombre,$mensaje,$idcliente,$idconductor,$idpedidoMov)
    {
        
    	$fecha = date('Y-m-d H:i:s');
    	$sql = "INSERT INTO chat (nombre,mensaje,fecha,idcliente,idconductor,idpedidoMov,estado) 
                VALUES ('$nombre','$mensaje','$fecha','$idcliente','$idconductor','$idpedidoMov',1);";

    	if(!$this->conn->query($sql)){
    		echo "Error chat: " . mysqli_error($this->conn);
    		exit();
    	}
    }

    public function GuardarChatDelivery($nombre,$mensaje,$idcliente,$idconductor,$idpedidoDeli)
    {
        
        $fecha = date('Y-m-d H:i:s');
        $sql = "INSERT INTO chat (nombre,mensaje,fecha,idcliente,idconductor,idpedidoDeli,estado)
                VALUES ('$nombre','$mensaje','$fecha','$idcliente','$idconductor','$idpedidoDeli',1);";

        if(!$this->conn->query($sql)){
            echo "Error chat: " . mysqli_error($this->conn);
            exit();
        }
        
    }

    public function GuardarChatReserva($nombre,$mensaje,$idcliente,$idconductor,$idpedidoRes)
    {
        
        $fecha = date('Y-m-d H:i:s');
        $sql = "INSERT INTO chat (nombre,mensaje,fecha,idcliente,idconductor,idpedidoRes,estado)
                VALUES ('$nombre','$mensaje','$fecha','$idcliente','$idconductor','$idpedidoRes',1);";

        if(!$this->conn->query($sql)){
            echo "Error chat: " . mysqli_error($this->conn);
            exit();
        }
    }

    public function MostrarChat($idconductor, $idpedidoMov, $idcliente)
    {
        $fechaActual = date('Y-m-d');

        $sql = "SELECT * FROM chat WHERE fecha LIKE '".$fechaActual."%' AND idconductor = '$idconductor' AND idpedidoMov = '$idpedidoMov' AND idcliente = '$idcliente' AND estado = '1' ORDER BY idchat DESC;";
        
            if(!$res = $this->conn->query($sql)){
                echo "Error chat: " . mysqli_error($this->conn);
                exit();
            }

            return $res;
    }

    public function MostrarChatDelivery($idconductor, $idpedidoDeli, $idcliente)
    {
        $fechaActual = date('Y-m-d');
        $sql = "SELECT * FROM chat WHERE fecha LIKE '".$fechaActual."%' AND idconductor = '$idconductor' AND idpedidoDeli = '$idpedidoDeli' AND idcliente = '$idcliente' AND estado = 1 ORDER BY idchat DESC;";
        

        if(!$res = $this->conn->query($sql)){
            echo "Error chat: " . mysqli_error($this->conn);
            exit();
        }

        return $res;
    }

    public function MostrarChatReserva($idconductor, $idreserva, $idcliente)
    {
        $fechaActual = date('Y-m-d');
        $sql = "SELECT * FROM chat WHERE fecha LIKE '".$fechaActual."%' AND idconductor = '$idconductor' AND idpedidoRes = '$idreserva' AND idcliente = '$idcliente' AND estado = true ORDER BY idchat DESC;";

        if(!$res = $this->conn->query($sql)){
            echo "Error chat: " . mysqli_error($this->conn);
            exit();
        }

        return $res;
    }

}
