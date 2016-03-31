<?php

include('config.php');


$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

$query =  "SELECT * FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena'";
$result = $mysqli->query($query);

$row = $result->fetch_row();

$rowcount=mysqli_num_rows($result);


 $tipo=$row[6];

session_start();
$_SESSION[]=$tipo;

if($rowcount==0){

header("Location: login.php");

}elseif ($rowcount>=1) {
	
	header("Location: ejem.php");
}

?>