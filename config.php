<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de conexion de la base de datos con todo el sistema.
*
*/

class Conexion
{

public function con()
	{

global $mysqli;	
$servidor="localhost";
$us="root";
$contra="";
$bd="statusexp";

$mysqli = new mysqli($servidor,$us,$contra, $bd);
/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
	return $mysqli;
}
}
?>