<?php
/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de licenciados, donde manda llamar todos los usuarios licenciados.
*
*/

?>

<div><center>
	   <div class="main-wrapper" style="margin-top:10px">
                     <a href="graficalic.php">
                        <i class="material-icons"  style="font-size: 4rem">pie_chart</i>
                    </a>
                </div>
	
		<table >
			<thead>	<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Opciones</th>
				
			</tr>	</thead>
			<tbody>		

				<?php
				include('config.php');
				$conexionSacadatos = new Conexion();
				$linkSacadatos = $conexionSacadatos->con();
				$linkSacadatos->set_charset("utf8");
				$consulta = "SELECT * FROM usuario WHERE tipo='licenciado'";
				$resultado = $linkSacadatos->query($consulta);
				$i=0;
				while ($fila = $resultado->fetch_row()) {

					echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td>
					<td><center>

					<a href=expediente.php?id_lic=".$fila[0]."><p>Expedientes</p></a>
					</center></td>";
					echo "</tr>";
					
					$i++;
				}
				echo "</tbody>";
				echo "</table>";
				?>


				
			</div>