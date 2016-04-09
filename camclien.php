<?php
session_start();
if($_SESSION["tipo"]=="administrador")
{
include("estilos.php");
include("encabezado.php");
include("ediclien.php");
include("pie.php");
}if ($_SESSION["tipo"]=="licenciado") {
	header("Location: cliente.php");}
?>