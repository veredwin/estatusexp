<?php
// CREANDO MI CONEXION
include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_GET['id_us'])){
	$id=$_GET['id_us'];
$consulta = "SELECT cliente.id_cliente, usuario.nombre, usuario.apellidopaterno, usuario.apellidomaterno, cliente.rfc, cliente.telefono, cliente.email, direccion.estado, direccion.ciudad, direccion.colonia, direccion.codpostal, direccion.calle, direccion.numero FROM usuario, cliente, direccion, usuariocliente where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and cliente.id_cliente=direccion.id_cliente and cliente.id_cliente=$id";
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();
$s="";
$id=$fila[0];
$nombre=$fila[1];
$apellidopaterno=$fila[3];
$apellidomaterno=$fila[2];
$rfc=$fila[4];
$telefono=$fila[5];
$email=$fila[6];
$estado=$fila[7];
$ciudad=$fila[8];
$colonia=$fila[9];
$codpostal=$fila[10];
$calle=$fila[11];
$numero=$fila[12];
}else{
$s="s";
$id="";
$nombre="";
$apellidopaterno="";
$apellidomaterno="";
$rfc="";
$telefono="";
$email="";
$estado="";
$ciudad="";
$colonia="";
$codpostal="";
$calle="";
$numero="";
}

include_once('actualizaclien.php');
if(isset($_POST["id"])){
$insertando=new  NuevoRegistro($_POST["id"],$_POST["nombre"],$_POST["apellidopaterno"],$_POST["apellidomaterno"], $_POST["rfc"], $_POST["telefono"], $_POST["email"], $_POST["estado"],  $_POST["ciudad"],  $_POST["colonia"],  $_POST["codpostal"],  $_POST["calle"] , $_POST["numero"]);
$insertando->actualiza();
}
elseif (isset($_POST["ids"])){
$insertando=new  NuevoRegistro($_POST["ids"],$_POST["nombre"],$_POST["apellidopaterno"],$_POST["apellidomaterno"], $_POST["rfc"], $_POST["telefono"], $_POST["email"], $_POST["estado"],  $_POST["ciudad"],  $_POST["colonia"],  $_POST["codpostal"],  $_POST["calle"] , $_POST["numero"]);
$insertando->inserta();
}elseif (isset($_GET["borrar"])){
$insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0,0,0,0,0,0,0,0);
$insertando->borra();
}else{  //header("Location: ejemplo2.php");
}

?>
<div class="form-style-10">
		<h1>Modificar datos</h1>
		<form method="post" action="#">
			
			<div class="ad">
		        <label>Nombre<input type="text" name="nombre" value="<?php echo $nombre?>" require=""></label>
		        <label>Apellido Paterno <input type="text" name="apellidopaterno" value="<?php echo  $apellidopaterno?>" require=""></label>
		        <label>Apellido Materno <input type="text" name="apellidomaterno" value="<?php echo  $apellidomaterno?>" require=""></label>
		        <label>RFC<input type="text" name="rfc" value="<?php echo  $rfc?>" require=""></label>
		        <label>Telefono<input type="text" name="telefono" value="<?php echo  $telefono?>" require=""></label>
		          <label>Email<input type="text" name="email" value="<?php echo  $email?>" require=""></label>
		            <label>Estado<input type="text" name="estado" value="<?php echo  $estado?>" require=""></label>
		              <label>Ciudad<input type="text" name="ciudad" value="<?php echo  $ciudad?>" require=""></label>
		                <label>Colonia<input type="text" name="colonia" value="<?php echo  $colonia?>" require=""></label>
		                  <label>Codigo Postal<input type="text" name="codpostal" value="<?php echo  $codpostal?>" require=""></label>
		                    <label>Calle<input type="text" name="calle" value="<?php echo  $calle?>" require=""></label>
		                      <label>Numero<input type="text" name="numero" value="<?php echo  $numero?>" require=""></label>

		        </label>
		        <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
		       
		    </div>
<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>
			
		</form>
					</div>