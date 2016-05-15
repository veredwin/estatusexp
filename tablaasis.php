<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de tabla de asesorias, carga las asesorias con una consulta en la base de datos. Estas se reflejan en una tabla.
*
*Aqui se ponen restricciones por tipo de usuario.
*
*/


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
$mysqli->set_charset("utf8");
			$consulta = "SELECT asesoria.id_asesoria, expediente.expediente, asesoria.descripcion, asesoria.fecha FROM asesoria, expediente $this->expediente";

		//echo $consulta;

//echo $consulta;
		$resultado = $mysqli->query($consulta);
		
		$i=0;

		while ($fila = $resultado->fetch_row()) {
			
			echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td>";
			echo "</tr>";

			$i++;
		}
        echo "</tbody>";
        
    
		echo "</table>";
	}
}
?>