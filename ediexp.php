<?php
// CREANDO MI CONEXION
include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_GET['id_us'])){
	$id=$_GET['id_us'];
	$consulta = "SELECT expediente.id_expediente, expediente.expediente, juicio.juicio, juzgado.juzgado, etapa.etapa, expediente.id_cliente FROM expediente, juicio, juzgado, etapa WHERE expediente.id_juicio=juicio.id_juicio and expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and id_expediente=$id";
	$resultado = $mysqli->query($consulta);
	$fila = $resultado->fetch_row();
	$s="";
	$id=$fila[0];
	$expediente=$fila[1];
	$juzgado=$fila[3];
	$juicio=$fila[2];
	$etapa=$fila[4];
	$cliente=$fila[5];
}else{
	$s="s";
	$id="";
	$expediente="";
	$juzgado="";
	$juicio="";
	$etapa="";
	$cliente="";
}

include_once('actualizaexp.php');
if(isset($_POST["id"])){
	$insertando=new  NuevoRegistro($_POST["id"],$_POST["expediente"],$_POST["juzgado"],$_POST["juicio"], $_POST["etapa"], $_POST["cliente"], $_POST["licenciado"]);
	$insertando->actualiza();
}
elseif (isset($_POST["ids"])){
	$insertando=new  NuevoRegistro($_POST["ids"],$_POST["expediente"],$_POST["juzgado"],$_POST["juicio"], $_POST["etapa"], $_POST["cliente"], $_POST["licenciado"]);
	$insertando->inserta();
}elseif (isset($_GET["borrar"])){
	$insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0,0);
	$insertando->borra();
}else{  //header("Location: ejemplo2.php");
}
$consulta =" SELECT  	id_juzgado, juzgado  FROM  juzgado";
$resultadojuz = $mysqli->query($consulta);

$consulta =" SELECT  	id_juicio, juicio  FROM  juicio";
$resultadojui = $mysqli->query($consulta);

$consulta =" SELECT  	id_etapa, etapa  FROM  etapa";
$resultadoeta = $mysqli->query($consulta);

$consulta =" SELECT  	id_cliente, rfc FROM  cliente";
$resultadoclien = $mysqli->query($consulta);

$consulta =" SELECT  	id_usuario, nombre FROM  usuario where tipo='licenciado'";
$resultadolic = $mysqli->query($consulta);
?>
<div class="form-style-10">
	<h1>Modificar datos</h1>
	<form method="post" action="#">
		
		<div class="ad">
			<label>Expediente<input type="text" name="expediente" value="<?php echo $expediente?>" require=""></label>
			<label> Juzgado<select require="" name="juzgado">
				<option  value=""  >Selecciona </option>
				<?PHP
				while ($fila = $resultadojuz->fetch_row()){
					
					echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
				}
				?>
			</select>
		</label>
		<label> Juicio<select require="" name="juicio">
			<option  value=""  >Selecciona </option>
			<?PHP
			while ($fila = $resultadojui->fetch_row()){
				
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
<label> Cliente<select require="" name="cliente">
	<option  value=""  >Selecciona </option>
	<?PHP
	while ($fila = $resultadoclien->fetch_row()){
		
		echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
	}
	?>
</select>
</label>
<label> Licenciado<select require="" name="licenciado">
	<option  value=""  >Selecciona </option>
	<?PHP
	while ($fila = $resultadolic->fetch_row()){
		
		echo "<option value='".$fila['0']."'> ".$fila['1']."</option>";
	}
	?>
</select>
</label>
<input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">

</div>
<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>

</form>
</div>