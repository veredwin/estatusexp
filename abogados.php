<?php session_start();
if($_SESSION["tipo"]=="administrador")
{
include("estilos.php");
include("encabezado.php");
include("abo.php");
include("pie.php");

}if ($_SESSION["tipo"]=="licenciado") {

include("estilos.php");
include("encabezado.php");
include("abo.php");
include("pie.php");
} else {
	
	//require("comprobarsesion.php");
}

?>