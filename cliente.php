<?php
require("comprobarsesion.php");
if($_SESSION["tipo"]=="administrador")
{
include("estilos.php");
include("encabezado.php");
include("clien.php");
include("pie.php");

}if ($_SESSION["tipo"]=="licenciado") {

include("estilos.php");
include("encabezado.php");
include("clien.php");
include("pie.php");
} else {
	

}

?>