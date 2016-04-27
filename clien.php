	<?php
	if (isset($_POST['nombre']) || isset($_POST['apellidopaterno']) || isset($_POST['apellidomaterno']) || isset($_POST['estado'])|| isset($_POST['ciudad']) || isset($_POST['codpostal'])){
		
		$revisar1=$_POST["nombre"];
		$revisar2=$_POST["apellidopaterno"];
		$revisar3=$_POST["apellidomaterno"];
		$revisar4=$_POST["estado"];
		$revisar5=$_POST["ciudad"];
		$revisar6=$_POST["codpostal"];

if ($revisar1!==""){ $nom="and usuario.nombre LIKE '%".$_POST["nombre"]."%'";
		
}else{$nom=$_POST["nombre"];}

if ($revisar2!==""){ $pat="and usuario.apellidopaterno LIKE '%".$_POST["apellidopaterno"]."%'";

}else{ $pat=$_POST["apellidopaterno"];}

if ($revisar3!==""){ $mat="and usuario.apellidomaterno LIKE '%".$_POST["apellidomaterno"]."%'";

}else{ $mat=$_POST["apellidomaterno"];}

if ($revisar4!==""){ $est="and direccion.estado LIKE '%".$_POST["estado"]."%'";

}else{ $est=$_POST["estado"];}

if ($revisar5!==""){ $ciu="and direccion.ciudad LIKE '%".$_POST["ciudad"]."%'";

}else{ $ciu=$_POST["ciudad"];}

if ($revisar6!==""){ $cod="and direccion.codpostal LIKE '%".$_POST["codpostal"]."%'";

}else{ $cod=$_POST["codpostal"];}



$nombre=$_POST["nombre"];
$apellidopaterno=$_POST["apellidopaterno"];
$apellidomaterno=$_POST["apellidomaterno"];
$estado=$_POST["estado"];
$ciudad=$_POST["ciudad"];
$codpostal=$_POST["codpostal"];


}else{

$nom="";
$pat="";
$mat="";
$est="";
$ciu="";
$cod="";
	$nombre="";
	$apellidopaterno="";
	$apellidomaterno="";
	$estado="";
	$ciudad="";
	$codpostal="";

}

?>
<div class="form-style-10">
		<h1>Modificar datos</h1>
		<form method="post" action="#">
			
			<div class="ad">
		        <label>Nombre<input type="text" name="nombre" value="<?php echo $nombre?>" require=""></label>
		        <label>Apellido Paterno <input type="text" name="apellidopaterno" value="<?php echo  $apellidopaterno?>" require=""></label>
		        <label>Apellido Materno <input type="text" name="apellidomaterno" value="<?php echo  $apellidomaterno?>" require=""></label>
		             <label>Estado<input type="text" name="estado" value="<?php echo  $estado?>" require=""></label>
		              <label>Ciudad<input type="text" name="ciudad" value="<?php echo  $ciudad?>" require=""></label>
		             
		                  <label>Codigo Postal<input type="text" name="codpostal" value="<?php echo  $codpostal?>" require=""></label>
		        <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
		       
		    </div>
<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>
			
		</form>
					</div>



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
	include_once('tablaclien.php');
$tablas = new Tablas($nom,$pat,$mat,$est,$ciu,$cod);
$tabla = $tablas->clientes();
			?>


			<a href="camclien.php"><button type="submit" class="inp" style=" margin-bottom: 50%;"><span>Agregar</span></button></a>

		</div>