<?php 
require_once "./Model/Conexion.php";

class DatosCliente
{
    private $conn;
    
    public function __construct()
	{
        $link = new Conexion();
		$this->conn = $link->Conectar();
		return $this->conn;
    }

    public function Datos($idcliente)
    {
    	
    	$sql ="SELECT idcliente,nombres,apellidos,telefono,email,dni,ciudad FROM cliente WHERE idcliente = ". $idcliente;

    	if(!$res = $this->conn->query($sql)){
    		echo "Error al Aceptar solicitud". mysqli_error($this->conn);
    		exit();
    	}

        $datos = $res->fetch_array(MYSQLI_ASSOC);
        return $datos;
		mysqli_close($this->conn);
    }

}
/*
$datoscliente = new DatosCliente();
$data = $datoscliente->Datos(1);
*/
