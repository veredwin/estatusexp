<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de tabla de expedientes, carga los expedientes con una consulta en la base de datos. Los expedientes se reflejan en una tabla.
*
*Aqui se ponen restricciones por tipo de usuario.
*
*/


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
		$mysqli->set_charset("utf8");
 $tipo=$_SESSION["tipo"];
                    if($tipo=="administrador"){

$consulta = "SELECT expediente.id_expediente, expediente.expediente,  juzgado.juzgado, juicio.juicio, etapa.etapa, cliente.rfc,
			usuario.nombre FROM expediente, juicio, juzgado, etapa, cliente, usuario WHERE expediente.id_juicio=juicio.id_juicio and 
			expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and cliente.id_cliente=expediente.id_cliente 
			and usuario.id_usuario=expediente.id_licenciado $this->expediente  $this->juzgado
			 $this->juicio  $this->etapa $this->lic";

                     } elseif ($tipo=="cliente") {
                     
	 $cliente=$_SESSION["cliente"];
                        
$consulta = "SELECT expediente.id_expediente, expediente.expediente,  juzgado.juzgado, juicio.juicio, etapa.etapa, cliente.rfc,
			usuario.nombre FROM expediente, juicio, juzgado, etapa, cliente, usuario WHERE expediente.id_juicio=juicio.id_juicio and 
			expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and cliente.id_cliente=expediente.id_cliente 
			and usuario.id_usuario=expediente.id_licenciado and expediente.id_cliente=$cliente $this->expediente  $this->juzgado
			 $this->juicio  $this->etapa";
                        //echo $consulta;
                        
                     } elseif ($tipo=="licenciado") { 
                     	 $lic=$_SESSION["licenciado"];
$consulta = "SELECT expediente.id_expediente, expediente.expediente,  juzgado.juzgado, juicio.juicio, etapa.etapa, cliente.rfc,
			usuario.nombre FROM expediente, juicio, juzgado, etapa, cliente, usuario WHERE expediente.id_juicio=juicio.id_juicio and 
			expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and cliente.id_cliente=expediente.id_cliente 
			and usuario.id_usuario=expediente.id_licenciado and expediente.id_licenciado=$lic $this->expediente  $this->juzgado
			 $this->juicio  $this->etapa";
                     

                     }
			

		

	//	echo $consulta;
		$resultado = $mysqli->query($consulta);
		
		$i=0;

		while ($fila = $resultado->fetch_row()) {
			
			echo "<td>".$fila[0]."</td><td><a href=asistencias.php?id_exp=".$fila[0]."><p>".$fila[1]."</p></a></td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td>";
            if ($tipo=="cliente") {
         echo   "<td><p>".$fila[5]."</p></td>";
                
                    echo "<td>".$fila[6]."</td>";
            }else{
                
                    echo   "<td><a href=cliente.php?rfc=".$fila[5]."><p>".$fila[5]."</p></a></td>";
                 echo "<td>".$fila[6]."</td>
			<td><center>
			<div class=\"main-wrapper2\">

				<a data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."> <i class=\"material-icons\">edit</i></a>
                
             
</div>


			</center></td>";
		 echo "<td><center>
  <div class=\"main-wrapper2\">
<a href=ediexp.php?borrar=".$fila[0]."> <i class=\"material-icons\">&#xE872</i></a>
</div>
</center></td>";
            }
            	echo "</tr>";
          

			$i++;
		}
        
			echo "</tbody>";	
		echo "</table>";
	}
}
?>