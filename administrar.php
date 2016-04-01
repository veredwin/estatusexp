<div>
		
			<center>
			<table class="responstable">;
<thead>	<tr>
					<th>Id</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Opciones</th>
					</tr>		

			<?php
include('config.php');
$consulta = "SELECT * FROM usuario";
$resultado = $mysqli->query($consulta);
$i=0;
    while ($fila = $resultado->fetch_row()) {
if ($i%2==0){
  //  echo "el $numero es par";
    $stile="row1";
}else{
   // echo "el $numero es impar";
     $stile="row2";
}
echo "<tr class=".$stile.">";
echo "<td>".$fila[0]."</td><td>".$fila[4]."</td><td>".$fila[1]."</td><td>".$fila[6]."</td>
<td><center>
<a href=editar.php?id_us=".$fila[0]."><p>Editar</p></a><a href=actualiza.php?borrar=".$fila[0]."><p>Borrar</p></a>
</center></td>";
echo "</tr>";
       
 $i++;
}
echo "</table>";
			?>


			<a href="editar.php"><button type="submit" class="inp" style=" margin-bottom: 50%;"><span>Agregar</span></button></a>
				
		</div>