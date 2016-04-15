<div>
		
			<center>
			<table class="responstable">;
<thead>	<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Opciones</th>
					
					</tr>		

			<?php
include('config.php');
$conexionSacadatos = new Conexion();
 $linkSacadatos = $conexionSacadatos->con();

$consulta = "SELECT * FROM usuario WHERE tipo='licenciado'";
$resultado = $linkSacadatos->query($consulta);
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
echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td>
<td><center>
<a href=abogados.php?id_us=".$fila[0]."><p>Expedientes</p></a>
</center></td>";
echo "</tr>";
       
 $i++;
}
echo "</table>";
			?>


				
		</div>