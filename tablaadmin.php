<?php
include_once('config.php');
class  Tablas{
	public $nom;
	public $tipo;
	function __construct($nom,$tipo)
	{
		$this->nom=$nom;
		$this->tipo=$tipo;
	}
	public function usuarios(){
		$conexionSacadatos = new Conexion();
		$mysqli = $conexionSacadatos->con();
			$consulta = "SELECT * from usuario where id_usuario>=1 $this->nom $this->tipo";
		
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
echo "<td>".$fila[0]."</td><td>".$fila[4]."</td><td>".$fila[1]."</td><td>".$fila[6]."</td>
<td><center>
<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."><p>Editar</p></a><a href=editar.php?borrar=".$fila[0]."><p>Borrar</p></a>
</center></td>";
echo "</tr>";
			$i++;
		}
		echo "</table>";
	}
}
?>