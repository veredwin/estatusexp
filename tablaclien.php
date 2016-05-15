<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de tabla de clientes, carga los clientes con una consulta en la base de datos. Los clientes se reflejan en una tabla.
*
*Aqui se ponen restricciones por tipo de usuario.
*
*/


include_once('config.php');

class  Tablas{
	public $nom;
	public $pat;
	public $mat;
	public $est;
	public $ciu;
	public $cod;
	public $rfc;

	function __construct($nom,$pat,$mat,$est,$ciu,$cod,$rfc)
	{
		$this->nom=$nom;
		$this->pat=$pat;
		$this->mat=$mat;
		$this->est=$est;
		$this->ciu=$ciu;
		$this->cod=$cod;
$this->rfc=$rfc;

	}

	public function clientes(){
		$conexionSacadatos = new Conexion();
		$mysqli = $conexionSacadatos->con();
		$mysqli->set_charset("utf8");
 $tipo=$_SESSION["tipo"];
                    if($tipo=="administrador"){
		
			$consulta = "SELECT cliente.id_cliente, usuario.nombre, usuario.apellidopaterno, usuario.apellidomaterno, 
			cliente.rfc, cliente.telefono, cliente.email, direccion.estado, direccion.ciudad, direccion.colonia, 
			direccion.codpostal, direccion.calle, direccion.numero FROM usuario, cliente, direccion, usuariocliente 
			where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and 
			cliente.id_cliente=direccion.id_cliente $this->nom  $this->pat
			 $this->mat  $this->est $this->ciu $this->cod $this->rfc";

                     } elseif ($tipo=="cliente") {
                     
header("location: cerrarsesion.php");

                     } elseif ($tipo=="licenciado") { 
                     	 $lic=$_SESSION["licenciado"];

$consulta = "SELECT cliente.id_cliente, usuario.nombre, usuario.apellidopaterno, usuario.apellidomaterno, 
			cliente.rfc, cliente.telefono, cliente.email, direccion.estado, direccion.ciudad, direccion.colonia, 
			direccion.codpostal, direccion.calle, direccion.numero FROM usuario, cliente, direccion, usuariocliente, expediente 
			where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and 
			cliente.id_cliente=direccion.id_cliente and cliente.id_cliente=expediente.id_cliente and expediente.id_licenciado=$lic $this->nom  $this->pat
			 $this->mat  $this->est $this->ciu $this->cod $this->rfc group by rfc";

                     }

	//	echo $consulta;
		$resultado = $mysqli->query($consulta);
		
		$i=0;

		while ($fila = $resultado->fetch_row()) {
			
				echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td><td>".$fila[7]."</td><td>".$fila[8]."</td><td>".$fila[9]."</td><td>".$fila[10]."</td><td>".$fila[11]."</td><td>".$fila[12]."</td>
				<td><center>
				<div class=\"main-wrapper2\">

				<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."> <i class=\"material-icons\">edit</i></a>
                
             
</div>
				</center></td>";
            echo "<td><center>
  <div class=\"main-wrapper2\">
<a href=ediclien.php?borrar=".$fila[0]."> <i class=\"material-icons\">&#xE872</i></a>
</div>
</center></td>";
				echo "</tr>";

			$i++;
		}
			echo "</tbody>";	
		echo "</table>";
	}
}
?>