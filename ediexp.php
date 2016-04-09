<?php
// CREANDO MI CONEXION
include('config.php');
if (isset($_GET['id_us'])){
	$id=$_GET['id_us'];
$consulta = "SELECT expediente.id_expediente, expediente.expediente, juicio.juicio, juzgado.juzgado, etapa.etapa FROM expediente, juicio, juzgado, etapa WHERE expediente.id_juicio=juicio.id_juicio and expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and id_expediente=$id";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();
$s="";
$id=$fila[0];
$expediente=$fila[1];
$juzgado=$fila[3];
$juicio=$fila[2];
$etapa=$fila[4];
}else{
$s="s";
$id="";
$expediente="";
$juzgado="";
$juicio="";
$etapa="";

}
?>
<div class="form-style-10">
		<h1>Modificar datos</h1>
		<form method="post" action="actualizaexp.php">
			
			<div class="ad">
		        <label>Expediente<input type="text" name="expediente" value="<?php echo $expediente?>" require=""></label>
		        <label>Juzgado <input type="text" name="juzgado" value="<?php echo  $juzgado?>" require=""></label>
		        <label>Juicio <input type="text" name="juicio" value="<?php echo  $juicio?>" require=""></label>
		        <label>Etapa<input type="text" name="etapa" value="<?php echo  $etapa?>" require=""></label>

		        </label>
		        <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
		       
		    </div>
<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>
			
		</form>
					</div>