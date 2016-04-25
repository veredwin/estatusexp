<div>
		
			<center>
			<table class="responstable">;
<thead>	<tr>
					<th>Id</th>
					<th>Expediente</th>
					<th>Juzgado</th>
					<th>Juicio</th>
					<th>Etapa</th>
					<th>Cliente</th>
					<th>Licenciado</th>
					<th>Opciones</th>
					</tr>		

			<?php
include('config.php');
$conexionSacadatos = new Conexion();
 $linkSacadatos = $conexionSacadatos->con();

$consulta = "SELECT expediente.id_expediente, expediente.expediente, juicio.juicio, juzgado.juzgado, etapa.etapa, cliente.rfc, usuario.nombre FROM expediente, juicio, juzgado, etapa, cliente, usuario WHERE expediente.id_juicio=juicio.id_juicio and expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and cliente.id_cliente=expediente.id_cliente and usuario.id_usuario=expediente.id_licenciado";
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
echo "<td>".$fila[0]."</td><td>".$fila[1]."</td><td>".$fila[2]."</td><td>".$fila[3]."</td><td>".$fila[4]."</td><td>".$fila[5]."</td><td>".$fila[6]."</td>
<td><center>
<a href=camexp.php?id_us=".$fila[0]."><p>Editar</p></a><a href=camexp.php?borrar=".$fila[0]."><p>Borrar</p></a>
</center></td>";
echo "</tr>";
       
 $i++;
}
echo "</table>";
			?>


			<a href="camexp.php"><button type="submit" class="inp" style=" margin-bottom: 50%;"><span>Agregar</span></button></a>
				
		</div>