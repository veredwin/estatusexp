<?php
// CREANDO MI CONEXION
include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");
$id="";

 $tipo=$_SESSION["tipo"];

if ($tipo=="cliente") {

                     	$id="and usuario.id_usuario=".$_SESSION["usuario"];

$consulta = "SELECT cliente.id_cliente, usuario.usuario, usuario.contrasena, usuario.nombre, usuario.apellidopaterno, usuario.apellidomaterno, cliente.rfc, cliente.telefono, cliente.email, direccion.estado, direccion.ciudad, direccion.colonia, direccion.codpostal, direccion.calle, direccion.numero FROM usuario, cliente, direccion, usuariocliente where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and cliente.id_cliente=direccion.id_cliente $id";
    //echo $consulta;
$resultado = $mysqli->query($consulta);
$fila = $resultado->fetch_row();
$s="";
$id=$fila[0];
$usuario=$fila[1];
$contrasena=$fila[2];
$nombre=$fila[3];
$apellidopaterno=$fila[4];
$apellidomaterno=$fila[5];
$rfc=$fila[6];
$telefono=$fila[7];
$email=$fila[8];
$estado=$fila[9];
$ciudad=$fila[10];
$colonia=$fila[11];
$codpostal=$fila[12];
$calle=$fila[13];
$numero=$fila[14];



include_once('actualizaclien.php');
if(isset($_POST["id"])){
$insertando=new  NuevoRegistro($_POST["id"],$_POST["nombre"],$_POST["apellidopaterno"],$_POST["apellidomaterno"], $_POST["rfc"], $_POST["telefono"], $_POST["email"], $_POST["estado"],  $_POST["ciudad"],  $_POST["colonia"],  $_POST["codpostal"],  $_POST["calle"] , $_POST["numero"], $_POST["usuario"], $_POST["contrasena"]);
$insertando->actualiza();
}

?>
<div class="form-style-10">
		
		<form method="post" action="#">
			<h1>Perfil</h1>
			<div class="ad">
   <div class="question">
				<input type="text" name="usuario" value="<?php echo $usuario?>" required=""><label>Usuario</label>
                </div>
              <div class="question">
				<input type="text" name="contrasena" value="<?php echo $contrasena?>" required=""><label>Contraseña</label>
                  </div>
              <div class="question">
		        <input type="text" name="nombre" value="<?php echo $nombre?>" required=""><label>Nombre</label>
                  </div>
              <div class="question">
		        <input type="text" name="apellidopaterno" value="<?php echo  $apellidopaterno?>" required=""><label> Apellido Paterno</label>
                  </div>
              <div class="question">
		        <input type="text" name="apellidomaterno" value="<?php echo  $apellidomaterno?>" required=""><label> Apellido Materno</label>
                  </div>
              <div class="question">
		        <input type="text" name="rfc" value="<?php echo  $rfc?>" required=""><label>RFC</label>
                  </div>
              <div class="question">
		       <input type="text" name="telefono" value="<?php echo  $telefono?>" required=""><label> Telefono</label>
                  </div>
              <div class="question">
		          <input type="text" name="email" value="<?php echo  $email?>" required=""><label>Email</label>
                  </div>
              <div class="question">
		            <input type="text" name="estado" value="<?php echo  $estado?>" required=""><label>Estado</label>
                  </div>
              <div class="question">
		             <input type="text" name="ciudad" value="<?php echo  $ciudad?>" required=""><label> Ciudad</label>
                  </div>
              <div class="question">
		                <input type="text" name="colonia" value="<?php echo  $colonia?>" required=""><label>Colonia</label>
                  </div>
              <div class="question">
		                  <input type="text" name="codpostal" value="<?php echo  $codpostal?>" required=""><label>Codigo Postal</label>
                  </div>
              <div class="question">
		                    <input type="text" name="calle" value="<?php echo  $calle?>" required=""><label>Calle</label>
                  </div>
              <div class="question">
		                      <input type="text" name="numero" value="<?php echo  $numero?>" required=""><label>Numero</label>
                  </div>

		        <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
		       
		    </div>
<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>
			
		</form>
					</div>

<?php
}else{
    	$id=$_SESSION["usuario"];
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
    
    
    include_once('actualiza.php');
if(isset($_POST["id"])){
    $insertando=new  NuevoRegistro($_POST["id"],$_POST["nombre"],$_POST["apellidopaterno"],$_POST["apellidomaterno"], $_POST["usuario"], $_POST["contrasena"], $_POST["tipo"]);
    $insertando->actual();
}
    
?>


<center><div>
    <form method="post" action="#">

        <h1>Usuario</h1>
        <div class="question">
            <input type="text" name="nombre" value="<?php echo $nombre;?>" required=""/>
            <label>Nombre</label>
        </div>
        <div class="question">
            <input type="text" name="apellidopaterno" value="<?php echo  $paterno;?>" required="">
            <label>Apellido Paterno</label>
        </div>
        <div class="question">
            <input type="text" name="apellidomaterno" value="<?php echo  $materno;?>" required="">
            <label>Apellido Materno</label>
        </div>
        <div class="question">
            <input type="text" name="usuario" value="<?php echo  $usuario;?>" required="">
            <label>Usuario</label>
        </div>
        <div class="question">
            <input type="text" name="contrasena" value="<?php echo $contrasena; ?>" required="">
            <label>Contraseña</label>
        </div>

 <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
 <input type="hidden" name="tipo" value="<?php echo  $tipo;?>">

     
        <center><button value="1" name="env" class="button" style=" margin-bottom: 5%;"><span>Guardar</span></button></center>

    </form>
    </div></center>



<?php
}
?>

          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script src="js/index.js"></script>