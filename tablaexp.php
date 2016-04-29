<?php
include_once('config.php');

class  Tablas{
	public $expediente;
	public $juzgado;
	public $juicio;
	public $etapa;
	public $lic;
	function __construct($expediente,$juzgado,$juicio,$etapa,$lic)
	{
		$this->expediente=$expediente;
		$this->juzgado=$juzgado;
		$this->juicio=$juicio;
		$this->etapa=$etapa;
		$this->lic=$lic;


	}

	public function expedientes(){
		$conexionSacadatos = new Conexion();
		$mysqli = $conexionSacadatos->con();
		
 $tipo=$_SESSION["tipo"];
                    if($tipo=="administrador"){

$consulta = "SELECT expediente.id_expediente, expediente.expediente,  juzgado.juzgado, juicio.juicio, etapa.etapa, cliente.rfc,
			usuario.nombre FROM expediente, juicio, juzgado, etapa, cliente, usuario WHERE expediente.id_juicio=juicio.id_juicio and 
			expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and cliente.id_cliente=expediente.id_cliente 
			and usuario.id_usuario=expediente.id_licenciado $this->expediente  $this->juzgado
			 $this->juicio  $this->etapa $this->lic";

                     } elseif ($tipo=="cliente") {
                     
header("location: login.php?nosession");

                     } elseif ($tipo=="licenciado") { 
$consulta = "SELECT expediente.id_expediente, expediente.expediente,  juzgado.juzgado, juicio.juicio, etapa.etapa, cliente.rfc,
			usuario.nombre FROM expediente, juicio, juzgado, etapa, cliente, usuario WHERE expediente.id_juicio=juicio.id_juicio and 
			expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and cliente.id_cliente=expediente.id_cliente 
			and usuario.id_usuario=expediente.id_licenciado /*and expediente.id_licenciado=\"  \"*/ $this->expediente  $this->juzgado
			 $this->juicio  $this->etapa";
                     }
			

		

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
			echo "<td>".$fila[0]."</td><td><a href=asistencias.php?id_exp=".$fila[0]."><p>".$fila[1]."</p></a></td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td><a href=cliente.php?rfc=".$fila[5]."><p>".$fila[5]."</p></a><td>".$fila[6]."</td>
			<td><center>
			<a href=camexp.php?id_us=".$fila[0]."><p>Editar</p></a><a href=camexp.php?borrar=".$fila[0]."><p>Borrar</p></a>
			</center></td>";
			echo "</tr>";

			$i++;
		}
		echo "</table>";
	}
}
?>