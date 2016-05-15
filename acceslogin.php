<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de login, recibe el usuario y contraseña, y hace una conexion en la base de datos, y consulta si existe.
* Inicia una sesion de tipo y de usuario, y redirige a bienvenido, en caso de no existir usuario y/o contraseña redirige a login.
*
*/

include_once('config.php');
class Validacion{
	public $usuario;
	public $contrasena;
public function __construct($usuario, $contrasena)
    {
         $this->user = $usuario;
         $this->contra = $contrasena;
    }
 public function valida(){
 $conexionSacadatos = new Conexion();
 $linkSacadatos = $conexionSacadatos->con();
 
$consulta = "SELECT * FROM usuario where usuario='$this->user' and contrasena='$this->contra'";
$resultado = $linkSacadatos->query($consulta);

$row = $resultado->fetch_row();

$rowcount=mysqli_num_rows($resultado);


 

if($rowcount==0){

header("Location: login.php");

}elseif ($rowcount>=1) {
session_start();
$_SESSION["usuario"]=$row[0];	
$_SESSION["tipo"]=$row[6];	
header("Location: bienvenido.php");
}
  }
}
?>