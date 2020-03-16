<?php 
require_once "Conexion.php";

class Listas
{
    private $conn;
    
    public function __construct()
	{
        $link = new Conexion();
		$this->conn = $link->Conectar();
		return $this->conn;
    }

    public function ServiciosAbiertosConductmor($idconductor)
    {
    	$sql="SELECT idpedirmovilidad,idcliente,idconductor,direccion,referencia,otro,tipouni,fecPedido,estado,fecTermino,calificacion,aceptado,fecAceptado 
        FROM pedirmovilidad 
        WHERE estado = 1;";
    	
    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando servicios Abiertos";
    	}

		return $res;
		mysqli_close($this->conn);
	}

	public function ServiciosAbiertosTodos()
	{
    	$sql="SELECT * FROM notificaciones WHERE estado = 0;";
    	
    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando servicios Abiertos";
    	}

		return $res;
		mysqli_close($this->conn);
	}

    public function SoloPedidos($idconductor)
    {
        $sql="SELECT idpedirmovilidad, idcliente, idconductor, direccion, referencia, tipouni, fecPedido, fecTermino FROM pedirmovilidad WHERE estado = 1 AND idconductor = '$idconductor';";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        return $res;
        mysqli_close($this->conn);
    }

    public function SoloDelivery($idconductor)
    {
        $sql="SELECT iddelivery,idcliente,idconductor,direccion,referencia,delivery,otro,fecPedido FROM pedirdelivery WHERE estado = 1 AND idconductor = '$idconductor';";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        return $res;
        mysqli_close($this->conn);
    }
    public function SoloReservas($idconductor)
    {
        $sql="SELECT idreserva,idcliente,idconductor,direccion,referencia,hora,otro,fecPedido,estado FROM reservar WHERE estado = 1 AND idconductor = '$idconductor';";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        return $res;
        mysqli_close($this->conn);
    }

    public function SoloPedidosMovilidadCount($idconductor)
    {
        $sql="SELECT count(*) FROM pedirmovilidad WHERE estado = 1 AND idconductor = '$idconductor';";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        $num = $res->fetch_array();

        return $num;
        mysqli_close($this->conn);
    }
    
    public function SoloDeliveryCount($idconductor)
    {
        $sql="SELECT count(*) FROM pedirdelivery WHERE estado = 1 AND idconductor = '$idconductor';";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        $num = $res->fetch_array();

        return $num;
        mysqli_close($this->conn);
    }

    public function SoloReservasCount($idconductor)
    {
        $sql="SELECT count(*) FROM reservar WHERE estado = 1 AND idconductor = '$idconductor';";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando servicios Abiertos";
        }

        $num = $res->fetch_array();

        return $num;
        mysqli_close($this->conn);
    }

	public function ServiciosConcluidos($idconductor)
	{
    	$sql="SELECT idpedirmovilidad, idcliente, direccion, fecPedido, fecTermino FROM pedirmovilidad WHERE estado = 0 AND idconductor='$idconductor';";
    	
    	if(!$res = $this->conn->query($sql)){
    		echo "Error mostrando Servicios Concluidos";
    	}

		return $res;
		mysqli_close($this->conn);
	}

    public function NombreCliente($idcliente){
        $sql="SELECT idcliente, nombres, apellidos, telefono FROM cliente WHERE idcliente = $idcliente;";
        
        if(!$res = $this->conn->query($sql)){
            echo "Error mostrando Servicios Concluidos";
        }

        $datos = $res->fetch_array(MYSQLI_ASSOC);
        return $datos;
        mysqli_close($this->conn);   
    }

}

#$listas = new Listas();
#$listas->ServiciosAbiertosConductor('M20');