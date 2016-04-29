<?php

if (isset($_GET['id_exp'])){

$exp="where asesoria.id_expediente=\"".$_GET["id_exp"]."\"";

}

?>
<div><center>
<table class=responstable>
	<thead>	<tr>
		<th>Id</th>
		<th>Descripcion</th>
		<th>Fecha</th>
	</tr>	
</tr>		

<?php
include_once('tablaasis.php');
$tablas = new Tablas($exp);
$tabla = $tablas->asesorias();
?>
</center>
</div>