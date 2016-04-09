<?php
// CREANDO MI CONEXION
include('config.php');
$nombre=$_POST["nombre"];
$apellidopaterno=$_POST["apellidopaterno"];
$apellidomaterno=$_POST["apellidomaterno"];
$rfc=$_POST["rfc"];
$telefono=$_POST["telefono"];
$email=$_POST["email"];
$estado=$_POST["estado"];
$ciudad=$_POST["ciudad"];
$colonia=$_POST["colonia"];
$codpostal=$_POST["codpostal"];
$calle=$_POST["calle"];
$numero=$_POST["numero"	];
if(isset($_POST["id"])){
	$id=$_POST["id"];
		$consulta = "UPDATE usuario, cliente, direccion, usuariocliente SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', rfc='$rfc', telefono='$telefono', email='$email', estado='$estado', ciudad='$ciudad', colonia='$colonia', codpostal='$codpostal', calle='$calle', numero='$numero'  where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and cliente.id_cliente=direccion.id_cliente and cliente.id_cliente=$id ";
			if ($mysqli->query($consulta)){
				header("Location: cliente.php");
											}
			else{
				header("Location: login.php");
				}
					}
elseif (isset($_POST["ids"])){
	//$id=$_POST["id"];
		$consulta = "INSERT into expediente values('', '$', '$juzgado','$juicio','$etapa') ";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
}elseif (isset($_GET["borrar"])){
	$id=$_GET["borrar"];
	$consulta = "DELETE from expediente WHERE id_expediente=$";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
}else{  header("Location: expediente.php"); }
?>