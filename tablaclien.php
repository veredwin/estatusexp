<?php
include_once('config.php');

class  Tablas{
	public $nom;
	public $pat;
	public $mat;
	public $est;
	public $ciu;
	public $cod;

	function __construct($nom,$pat,$mat,$est,$ciu,$cod)
	{
		$this->nom=$nom;
		$this->pat=$pat;
		$this->mat=$mat;
		$this->est=$est;
		$this->ciu=$ciu;
		$this->cod=$cod;


	}

	public function clientes(){
		$conexionSacadatos = new Conexion();
		$mysqli = $conexionSacadatos->con();

		
			$consulta = "SELECT cliente.id_cliente, usuario.nombre, usuario.apellidopaterno, usuario.apellidomaterno, 
			cliente.rfc, cliente.telefono, cliente.email, direccion.estado, direccion.ciudad, direccion.colonia, 
			direccion.codpostal, direccion.calle, direccion.numero FROM usuario, cliente, direccion, usuariocliente 
			where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and 
			cliente.id_cliente=direccion.id_cliente $this->nom  $this->pat
			 $this->mat  $this->est $this->ciu $this->cod";


	//	echo $consulta;
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
				echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td><td>".$fila[7]."</td><td>".$fila[8]."</td><td>".$fila[9]."</td><td>".$fila[10]."</td><td>".$fila[11]."</td><td>".$fila[12]."</td>
				<td><center>
				<a href=camclien.php?id_us=".$fila[0]."><p>Editar</p></a><a href=camclien.php?borrar=".$fila[0]."><p>Borrar</p></a>
				</center></td>";
				echo "</tr>";

			$i++;
		}
		echo "</table>";
	}
}
?>