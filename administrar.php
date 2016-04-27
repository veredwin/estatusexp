<?php
if (isset($_POST['nombre']) || isset($_POST['tipo'])){

	$revisar=$_POST["nombre"];

	if ($revisar!==""){
$nom="and usuario.nombre LIKE '%".$_POST["nombre"]."%'";

	}else{
$nom=$_POST["nombre"];

	}
	
$nombre=$_POST["nombre"];
	$tipo=$_POST["tipo"];
	
}else{
	$nombre="";
	$nom="";
	$tipo="";
}


?>
<!-- formulario de busquedas -->
		<div class="form-style-10">
			<form method="post" action="#">

				<div class="ad">
					<label>Nombre<input type="text" name="nombre" value="<?php  echo $nombre ?>" require=""></label>
					
					 <label>Tipo <select require="" name="tipo">
						<option value="">Elige una Opcion</option>
						<option value="and usuario.tipo=&quot;administrador&quot;" >Administrador</option>
						<option value="and usuario.tipo=&quot;cliente&quot;" >Cliente</option>
						<option value="and usuario.tipo=&quot;licenciado&quot;" >Licenciado</option>
						</select>
		        </label>
				
		

	</div>
	<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>

</form>
</div>

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
include_once('tablaadmin.php');
$tablas = new Tablas($nom,$tipo);
$tabla = $tablas->usuarios();

			?>


			<a href="editar.php"><button type="submit" class="inp" style=" margin-bottom: 50%;"><span>Agregar</span></button></a>
				
		</div>