<?php
include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_POST['expediente']) || isset($_POST['juzgado']) || isset($_POST['juicio']) || isset($_POST['etapa'])){

	$revisar=$_POST["expediente"];

	if ($revisar!==""){
$exp="and expediente.expediente LIKE '%".$_POST["expediente"]."%'";

	}else{
$exp=$_POST["expediente"];

	}
	

	$juzgado=$_POST["juzgado"];
	$juicio=$_POST["juicio"];
	$etapa=$_POST["etapa"];
	$expediente=$_POST["expediente"];
}else{
	$expediente="";
	$exp="";
	$juzgado="";
	$juicio="";
	$etapa="";
}


$consulta =" SELECT  	id_juzgado, juzgado  FROM  juzgado";
$resultadojuz = $mysqli->query($consulta);

$consulta =" SELECT  	id_juicio, juicio  FROM  juicio";
$resultadojui = $mysqli->query($consulta);

$consulta =" SELECT  	id_etapa, etapa  FROM  etapa";
$resultadoeta = $mysqli->query($consulta);

?>
<div >

	<center>

		<!-- formulario de busquedas -->
		<div class="form-style-10">
			<form method="post" action="#">

				<div class="ad">
					<label>Expediente<input type="text" name="expediente" value="<?php  echo $expediente ?>" require=""></label>
					<label> Juzgado <select require="" name="juzgado">
						<option  value=""  >Selecciona </option>
						<?PHP
						while ($fila = $resultadojuz->fetch_row()){

							echo "<option value=\"and expediente.id_juzgado=".$fila['0']."\"> ".$fila['1']."</option>";
						}
						?>
					</select>
				</label>
				<label> Juicio<select require="" name="juicio">
					<option  value=""  >Selecciona </option>
					<?PHP
					while ($fila = $resultadojui->fetch_row()){

						echo "<option value=\"and expediente.id_juicio=".$fila['0']."\"> ".$fila['1']."</option>";
					}
					?>
				</select>
			</label>
			<label> Etapa<select require="" name="etapa">
				<option  value=""  >Selecciona </option>
				<?PHP
				while ($fila = $resultadoeta->fetch_row()){

					echo "<option value=\"and expediente.id_etapa=".$fila['0']."\"> ".$fila['1']."</option>";
				}
				?>
			</select>
		</label>
		

	</div>
	<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>

</form>
</div>

<!-- FIN del formulario de busquedas -->


<table class=responstable>
	<thead>	<tr>
		<th>Id</th>
		<th>Expediente</th>
		<th>Juzgado</th>
		<th>Juicio</th>
		<th>Etapa</th>
		<th>Cliente</th>
		<th>Licenciado</th>
		<th>Opciones</th>
	</tr>	
</tr>		

<?php
include_once('tablaexp.php');
$tablas = new Tablas($exp,$juzgado,$juicio,$etapa);
$tabla = $tablas->expedientes();
?>
</div>




			<a href="camexp.php"><button type="submit" class="inp" style=" margin-bottom: 50%;"><span>Agregar</span></button></a>

		</div>