<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de conexion donde recibe usuario y contraseña de login y la reenvia a acceslogin.php
*
*/


include('config.php');


$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

include('acceslogin.php');
$conexion=new Validacion($usuario,$contrasena);
$conexion->valida();

/*$query =  "SELECT * FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena'";
$result = $mysqli->query($query);

$row = $result->fetch_row();

$rowcount=mysqli_num_rows($result);


 

if($rowcount==0){

header("Location: login.php");

}elseif ($rowcount>=1) {


session_start();
$_SESSION["tipo"]=$row[6];	
	header("Location: principal.php");
}*/

?>