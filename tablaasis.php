<?php
include_once('config.php');

class  Tablas{
	public $expediente;
	function __construct($expediente)
	{
		$this->expediente=$expediente;

	}

	public function asesorias(){
		$conexionSacadatos = new Conexion();
		$mysqli = $conexionSacadatos->con();

			$consulta = "SELECT * FROM asesoria $this->expediente";

		

//echo $consulta;
		$resultado = $mysqli->query($consulta);
		
		$i=0;

		while ($fila = $resultado->fetch_row()) {
			if ($i%2==0){
  //  echo "el $numero es par";
				$stile="row1";
			}else{
   // echo "el $numero es impar";
				$stile="row2";
			}
			echo "<tr class=".$stile.">";
			echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td>";
			echo "</tr>";

			$i++;
		}
		echo "</table>";
	}
}
?>