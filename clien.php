<div>
		
			<center>
			<table class="responstable">;
<thead>	<tr>
					<th>Id</th>
					<th>Cliente</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>RFC</th>
					<th>Telefono</th>
					<th>Email</th>
					<th>Estado</th>
					<th>Ciudad</th>
					<th>Colonia</th>
					<th>Codigo Postal</th>
					<th>Calle</th>
					<th>Numero</th>
					<th>Opciones</th>
					</tr>		

			<?php
include('config.php');
$conexionSacadatos = new Conexion();
 $linkSacadatos = $conexionSacadatos->con();

$consulta = "SELECT cliente.id_cliente, usuario.nombre, usuario.apellidopaterno, usuario.apellidomaterno, cliente.rfc, cliente.telefono, cliente.email, direccion.estado, direccion.ciudad, direccion.colonia, direccion.codpostal, direccion.calle, direccion.numero FROM usuario, cliente, direccion, usuariocliente where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and cliente.id_cliente=direccion.id_cliente";
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
echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td><td>".$fila[7]."</td><td>".$fila[8]."</td><td>".$fila[9]."</td><td>".$fila[10]."</td><td>".$fila[11]."</td><td>".$fila[12]."</td>
<td><center>
<a href=camclien.php?id_us=".$fila[0]."><p>Editar</p></a><a href=camclien.php?borrar=".$fila[0]."><p>Borrar</p></a>
</center></td>";
echo "</tr>";
       
 $i++;
}
echo "</table>";
			?>


			<a href="camclien.php"><button type="submit" class="inp" style=" margin-bottom: 50%;"><span>Agregar</span></button></a>
				
		</div>