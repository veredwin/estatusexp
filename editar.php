<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Se inicia Sesion.
*
* Se revisa la sesion tipo si existe abre los archivos.
*
* Se carga 4 archivos php, sin embargo 3 son predefinidos, y solo se cambia el body.
*/

session_start();
if($_SESSION["tipo"]=="administrador")
{
include("estilos.php");
include("encabezado.php");
include("edicion.php");
include("pie.php");
}
else
{
header("admin.php");	
}
?>