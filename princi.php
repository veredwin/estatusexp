<?php
include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

include_once('enviarasesoria.php');
if(isset($_POST["expediente"])){
	$insertando=new  NuevoRegistro($_POST["expediente"],$_POST["etapa"],$_POST["descripcion"]);
	$insertando->inserta();
}


$consulta =" SELECT  	id_expediente, expediente  FROM  expediente";
$resultadoexp = $mysqli->query($consulta);

$consulta =" SELECT  	id_etapa, etapa  FROM  etapa";
$resultadoeta = $mysqli->query($consulta);
?>


<form  method="post" action="#">
	
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

			<!--<li> <label for="name">Nombre:</label> 
				<input type="text" placeholder="John Doe" required /> 
			</li>
			<li>
				<label for="email">Email:</label> 
				<input type="email" name="email" placeholder="info@developerji.com" required />
				<span class="form_hint">Formato correcto: "name@something.com"</span> 
			</li>
			<li> 
				<label for="website">Sitio web:</label> 
				<input type="url" name="website" placeholder="http://developerji.com" required pattern="(http|https)://.+" /> 
				<span class="form_hint">Formato correcto: "http://developerji.com"</span> 
			</li>-->
			<li>
				<label for="descripcion">
					Descripción:</label> 
				<textarea name="descripcion" cols="40" rows="6" required></textarea>
			</li>
			<li> <button class="submit" type="submit">Enviar mensaje</button>
			</li> 
		</ul>
	
</form>
