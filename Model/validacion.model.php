<?php
require 'Conexion.php';

class Validacion
{
	private $conn;

    function __construct()
    {
        $conection = new Conexion();
        $this->conn= $conection->Conectar();
        return $this->conn;
    }

    function ValidacionCliente($telefono, $pass){
		
		$mipass = sha1($pass);

		$sql = "SELECT idcliente, concat(nombres,' ', apellidos) as nombre, telefono FROM cliente WHERE telefono = '$telefono' AND passwd = '$pass';";
		

		if(!$rpta = $this->conn->query($sql)){
			echo("Error description: " . $this->conn->error);
			exit();
		}

        $data = $rpta->fetch_array(MYSQLI_ASSOC);

        return $data;

	}

	function ValidacionCuenta($user, $pass){
		
		$mipass = sha1($pass);

		$sql = "SELECT idconductor, nivel FROM login WHERE username='$user' AND userpass = '$mipass' AND estado = 1 LIMIT 1;";
		

		if(!$rpta = $this->conn->query($sql)){
			echo("Error description: " . $this->conn->error);
			exit();
		}
        $data = $rpta->fetch_array(MYSQLI_ASSOC);
      
        mysqli_close($this->conn);
        return $data;
	}
}
