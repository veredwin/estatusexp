<?php
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
?>