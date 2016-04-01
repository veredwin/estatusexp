<?php
// CREANDO MI CONEXION
include('config.php');
$nombre=$_POST["nombre"];
$paterno=$_POST["apellidopaterno"];
$materno=$_POST["apellidomaterno"];
$usuario=$_POST["usuario"];
$contra=$_POST["contrasena"];
$tipo=$_POST["tipo"];
if(isset($_POST["id"])){
	$id=$_POST["id"];
		$consulta = "UPDATE usuario SET nombre='$nombre', apellidopaterno='$paterno', apellidomaterno='$materno', usuario='$usuario',contrasena='$contra', tipo='$tipo' where id_usuario=$id ";
			if ($mysqli->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
					}
elseif (isset($_POST["ids"])){
	//$id=$_POST["id"];
		$consulta = "INSERT into usuario values('', '$nombre', '$paterno','$materno','$usuario', '$contra', '$tipo') ";
			if ($mysqli->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
}elseif (isset($_GET["borrar"])){
	$id=$_GET["borrar"];
	$consulta = "DELETE from usuario where id_usuario=$id ";
			if ($mysqli->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
}else{  header("Location: admin.php"); }
?>