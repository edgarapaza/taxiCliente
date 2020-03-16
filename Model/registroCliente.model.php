<?php
require_once("Conexion.php");

class Registro
{
    private $conn;

    public function __construct()
    {
    	$link = new Conexion();
    	$this->conn= $link->Conectar();   
    	return $this->conn;
    }

    public function RegistroCliente($nombres,$apellidos,$telefono,$email,$dni,$ciudad,$passwd)
    {
    	
        $sql1 = "SELECT * FROM cliente WHERE telefono = '$telefono' OR dni = '$dni';";
        
        
        $res1 = $this->conn->query($sql1);
        $numero = $res1->num_rows;

        //echo "Numero de registros: ".$numero;
        
        if($numero > 0)
        {
            return "DUPLICADO";
        }else{
            
            $sql = "INSERT INTO cliente VALUES (null,'$nombres','$apellidos','$telefono','$email','$dni','$ciudad','$passwd');";

        	if(!$this->conn->query($sql))
        	{
        		echo "Error Registrando Cliente". mysqli_error($this->conn);
                       
        	}

            return "Registrado";
        }
        
    }
}