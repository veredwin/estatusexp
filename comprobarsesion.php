<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Se inicia Sesion.
*
* Se revisa la sesion.
*
* Sino hay redirige al login.
*/

session_start();
if (isset($_SESSION['tipo'])){ 
//echo "La sesión existe ..."; 
} else {
header("location: login.php?nosession");
}
	
?>