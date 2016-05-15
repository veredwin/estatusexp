<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Se inicia Sesion.
*
* Se revisa la sesion.
*
* Destruye la sesion, y redirige a login.
*/

  session_start();
  unset($_SESSION["tipo"]); 
  session_destroy();
  header("Location: login.php");
 // exit;
?>