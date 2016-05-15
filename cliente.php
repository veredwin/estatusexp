<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
*
* Se revisa la sesion si existe abre los archivos, sino manda al login.
*
* Se carga 4 archivos php, sin embargo 3 son predefinidos, y solo se cambia el body.
*/

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
}

?>