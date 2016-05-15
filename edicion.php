<?php
// CREANDO MI CONEXION
include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();
$mysqli->set_charset("utf8");
if (isset($_GET['id_us'])){
    $id=$_GET['id_us'];

    if ($id>0) {
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
    } else{
        $s="s";
        $id="";
        $nombre="";
        $paterno="";
        $materno="";
        $usuario="";
        $contrasena="";
        $tipo="";

    }}

include_once('actualiza.php');
if(isset($_POST["id"])){
    $insertando=new  NuevoRegistro($_POST["id"],$_POST["nombre"],$_POST["apellidopaterno"],$_POST["apellidomaterno"], $_POST["usuario"], $_POST["contrasena"], $_POST["tipo"]);
    $insertando->actualiza();
}
elseif (isset($_POST["ids"])){
    $insertando=new  NuevoRegistro($_POST["ids"],$_POST["nombre"],$_POST["apellidopaterno"],$_POST["apellidomaterno"],$_POST["usuario"], $_POST["contrasena"], $_POST["tipo"]);
    $insertando->inserta();
}elseif (isset($_GET["borrar"])){
    $insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0,0);
    $insertando->borra();
}else{  //header("Location: ejemplo2.php");
}

?>
<center><div>
    <form method="post" action="edicion.php">

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

        <div>	        

  <select name="tipo" id="sources" class="custom-select sources" placeholder="<?php if ($tipo =="" ) {echo "Tipo de Usuario";} else{
    $foo = ucwords($tipo);
   echo $foo; }?> ">
      
    
            <option value="administrador" <?php if ($tipo =="administrador" ) echo 'selected'; 	?> >Administrador</option>
                <option value="cliente"  <?php if ($tipo =="cliente" ){ echo "selected";} 	?>>Cliente</option>
                <option value="licenciado"  <?php if ($tipo =="licenciado" ) echo 'selected'; 	?>>Licenciado</option>
  </select>
 


            <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">

        </div>
        <center><button value="1" name="env" class="button" style=" margin-bottom: 5%;"><span>Guardar</span></button></center>

    </form>
    </div></center>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script src="js/index.js"></script>