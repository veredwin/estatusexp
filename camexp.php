<?php
session_start();
if($_SESSION["tipo"]=="administrador")
{
include("estilos.php");
include("encabezado.php");
include("ediexp.php");
include("pie.php");
}if ($_SESSION["tipo"]=="licenciado") {
	header("Location: expediente.php");}
?>