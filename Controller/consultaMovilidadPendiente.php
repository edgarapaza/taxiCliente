<?PHP
require_once "./Model/Conexion.php";

$conn = new Conexion();
$link = $conn->Conectar();

$json=array();


		$sql="SELECT idpedir,idcliente,idauto,direccion,referencia,tipouni,estado FROM taxiseguro.pedirmovilidad WHERE idauto = 0;";
		
		$resultado=$link->query($sql);
			
		if($registro=$resultado->fetch_array()){
			$json['pedidosMovilidad'][]=$registro;
		//	echo $registro['id'].' - '.$registro['nombre'].' - '.$registro['profesion'].'<br/>';
		}else{
			$resultar["idcliente"]=0;
			$resultar["direccion"]='no registra';
			$resultar["referencia"]='no registra';
			$resultar["tipoUnidad"]='no registra';
			$json['pedidosMovilidad'][]=$resultar;
		}
		
		mysqli_close($conn);
		echo json_encode($json);

?>