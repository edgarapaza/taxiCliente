<?php
include_once "Conexion.php";


class ListadoChat
{
    
    private $conn;
    
    public function __construct()
	{
        $link = new Conexion();
		$this->conn = $link->Conectar();
		return $this->conn;
    }

    public function CantidadChatMovilidad($idcliente){
        
        $sql = "SELECT idpedidoMov 
                FROM chat 
                WHERE idcliente = $idcliente AND idpedidoMov <> 0 GROUP BY idpedidoMov;";

        if(!$res = $this->conn->query($sql)){
            echo "Error: ".mysqli_error($this->conn);
        }

        return $res;
        mysqli_close($this->conn);
    }

    public function CantidadChatDelivery($idcliente){
        $sql = "SELECT idpedidoDeli 
                FROM chat 
                WHERE idcliente = $idcliente AND idpedidoDeli <> 0 GROUP BY idpedidoDeli;";

        if(!$res = $this->conn->query($sql)){
            echo "Error: ".mysqli_error($this->conn);
        }

        return $res;
        mysqli_close($this->conn);
    }

    public function CantidadChatReserva($idcliente){
        $sql = "SELECT idpedidoRes 
                FROM chat 
                WHERE idcliente = $idcliente AND idpedidoRes <> 0 GROUP BY idpedidoRes;";

        if(!$res = $this->conn->query($sql)){
            echo "Error: ".mysqli_error($this->conn);
        }

        return $res;
        mysqli_close($this->conn);
    }

    public function ChatMovilidad($idcliente){
    	$sql = "SELECT idchat, nombre,mensaje,fecha,idcliente,idconductor,idpedidoMov,idpedidoDeli,idpedidoRes,estado 
    	        FROM chat 
    	        WHERE idcliente = $idcliente AND estado = 1 AND idpedidoMov <> 0 AND idconductor <>0;";

    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando servicios Abiertos";
    	}

		return $res;
		mysqli_close($this->conn);
    }

    public function ChatDelivery($idcliente){
    	$sql = "SELECT idchat, nombre,mensaje,fecha,idcliente,idconductor,idpedidoMov,idpedidoDeli,idpedidoRes,estado 
    	        FROM chat 
    	        WHERE idcliente = $idcliente AND estado = 1 AND idpedidoDeli <> 0 AND idconductor <> 0;";

    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando servicios Abiertos";
    	}

		return $res;
		mysqli_close($this->conn);
    }

    public function ChatReserva($idcliente){
    	$sql = "SELECT idchat, nombre,mensaje,fecha,idcliente,idconductor,idpedidoMov,idpedidoDeli,idpedidoRes,estado 
    	        FROM chat 
    	        WHERE idcliente = $idcliente AND estado = 1 AND idpedidoRes <> 0 AND idconductor <>0;";

    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando servicios Abiertos";
    	}

		return $res;
		mysqli_close($this->conn);
    }

}

