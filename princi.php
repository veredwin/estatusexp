<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de principal es para agregar una asesoria.
*
*/

include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

include_once('enviarasesoria.php');
if(isset($_POST["expediente"])){
	$insertando=new  NuevoRegistro($_POST["expediente"],$_POST["etapa"],$_POST["descripcion"]);
	$insertando->inserta();
}
$lic="";
if ($tipo=="licenciado") { 
                     	 $lic="where id_licenciado=".$_SESSION["licenciado"];
}

$consulta =" SELECT  	id_expediente, expediente  FROM  expediente $lic";
$resultadoexp = $mysqli->query($consulta);

$consulta =" SELECT  	id_etapa, etapa  FROM  etapa";
$resultadoeta = $mysqli->query($consulta);
?>


<form  method="post" action="princi.php">
	
		<ul>
			<li>
				<h2>Asesoria Nueva</h2>
				
			</li> 

			<label> Expediente<select require="" name="expediente">
				<option  value=""  >Selecciona </option>
				<?PHP

				while ($fila = $resultadoexp->fetch_row()){

					echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
				}
				?>
			</select>
		</label>
		<label> Etapa<select require="" name="etapa">
				<option  value=""  >Selecciona </option>
				<?PHP
				while ($fila = $resultadoeta->fetch_row()){

					echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
				}
				?>
			</select>
		</label>

			
			<li>
				<label for="descripcion">
					Descripción:</label> 
				<textarea name="descripcion" cols="40" rows="6" required></textarea>
			</li>
			<li> <button class="submit" type="submit">Guardar Asesoria</button>
			</li> 
		</ul>
	
</form>
