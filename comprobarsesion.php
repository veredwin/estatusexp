<?php
session_start();
if (isset($_SESSION['tipo'])){ 
//echo "La sesión existe ..."; 
} else {
header("location: login.php?nosession");
}
	
?>