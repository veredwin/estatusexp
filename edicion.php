<?php
// CREANDO MI CONEXION
include('config.php');
if (isset($_GET['id_us'])){
	$id=$_GET['id_us'];
$consulta = "SELECT * FROM usuario where id_usuario=$id";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();
$s="";
$id=$fila[0];
$nombre=$fila[1];
$paterno=$fila[2];
$materno=$fila[3];
$usuario=$fila[4];
$contrasena=$fila[5];
$tipo=$fila[6];
}else{
$s="s";
$id="";
$nombre="";
$paterno="";
$materno="";
$usuario="";
$contrasena="";
$tipo="";

}
?>
<div class="form-style-10">
		<h1>Modificar datos</h1>
		<form method="post" action="actualiza.php">
			
			<div class="ad">
		        <label>Nombre<input type="text" name="nombre" value="<?php echo $nombre?>" require=""></label>
		        <label>Apellido Paterno <input type="text" name="apellidopaterno" value="<?php echo  $paterno?>" require=""></label>
		        <label>Apellido Materno <input type="text" name="apellidomaterno" value="<?php echo  $materno?>" require=""></label>
		        <label>Usuario<input type="text" name="usuario" value="<?php echo  $usuario?>" require=""></label>
		        <label>Contraseña <input type="password" name="contrasena" value="<?php echo $contrasena ?>" required=""></label>
		        <label>Tipo <select require="" name="tipo"><?php if($tipo==administrador){ $a="selected"; $b="";$c=""; $d="";} 
		        	elseif($tipo==cliente)  {$a=""; $b="selected"; $c=""; $d="";} elseif($tipo==licenciado)  {$a=""; $b="";$c="selected"; $d="";} else {$a=""; $b=""; $c=""; $d="selected"; }  ?>
						<option <?php echo $d; ?>>Elige una Opcion</option>
						<option value="administrador" <?php echo $a; ?>>Administrador</option>
						<option value="cliente" <?php echo $b; ?>>Cliente</option>
						<option value="licenciado" <?php echo $c; ?>>Licenciado</option>
						</select>
		        </label>
		        <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
		       
		    </div>
<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>
			
		</form>
					</div>