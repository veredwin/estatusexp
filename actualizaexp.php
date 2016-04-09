<?php
// CREANDO MI CONEXION
include('config.php');
$expediente=$_POST["expediente"];
$juzgado=$_POST["juzgado"];
$juicio=$_POST["juicio"];
$etapa=$_POST["etapa"];
if(isset($_POST["id"])){
	$id=$_POST["id"];
		$consulta = "UPDATE expediente, juicio, etapa, juzgado SET expediente='$expediente', juzgado='$juzgado', juicio='$juicio', etapa='$etapa' WHERE expediente.id_juicio=juicio.id_juicio and expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and id_expediente=$id ";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
					}
elseif (isset($_POST["ids"])){
	//$id=$_POST["id"];
		$consulta = "INSERT into expediente values('', '$expediente', '$juzgado','$juicio','$etapa') ";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
}elseif (isset($_GET["borrar"])){
	$id=$_GET["borrar"];
	$consulta = "DELETE from expediente WHERE id_expediente=$id";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
}else{  header("Location: expediente.php"); }
?>