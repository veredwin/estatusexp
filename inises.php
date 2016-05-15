<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de login, este carga estilos diferentes.
*
* Se muestra un formulario para introducir usuario y contraseña
*
*/
?>


<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/estilologin.css">
<title>StatusExp</title>
</head>


<body >
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,700,900,300,100' rel='stylesheet' type='text/css'>
<div class="overlay">
  <div class="wrap">
  <center>	<img src="imagenes/balanza.png" ></center>
   <h1>Iniciar Sesión</h1>
   <form name="iniciarsesion" method="post" action="conexion.php">
<input type="text" name="usuario" placeholder="Usuario">
<input type="password" name="contrasena" placeholder="Contraseña">
    <input type="submit" value="Iniciar Sesion">
     </form> 
    <a href="#"><i class="fa fa-question"></i>Olvide mi Contraseña</a>
    <a href="#"><i class="fa fa-user"></i>Crear Cuenta</a>
  </div>
</div>


</body>
</html>