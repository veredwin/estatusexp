 	<?php
// CREANDO MI CONEXION

include_once('config.php');
class NuevoRegistro 
{
	
	
	public $id;
	public $nombre;
	public $apellidopaterno;
	public $apellidomaterno;
	public $usuario;
	public $contrasena;
	public $tipo;
	
	function __construct($id, $nombre, $apellidopaterno, $apellidomaterno, $usuario, $contrasena, $tipo)
	{

	$this->id=$id;
	$this->nombre=$nombre;
	$this->apellidopaterno=$apellidopaterno;
	$this->apellidomaterno=$apellidomaterno;
	$this->usuario=$usuario;
	$this->contrasena=$contrasena;
	$this->tipo=$tipo;
	}
	public function actualiza()
	{
	$conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();			
	$consulta = "UPDATE usuario SET nombre='$this->nombre', apellidopaterno='$this->apellidopaterno', apellidomaterno='$this->apellidomaterno', usuario='$this->usuario', contrasena='$this->contrasena', tipo='$this->tipo' where id_usuario=$this->id ";
			
			if ($linkSacadatos->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
	}
	public function inserta()
	{
		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
			$consulta = "INSERT into usuario values('', '$this->nombre', '$this->apellidopaterno','$this->apellidomaterno','$this->usuario','$this->contrasena', '$this->tipo') ";
			echo $consulta;
			if ($linkSacadatos->query($consulta)){
				header("Location: admin.php");
											}
			else{
				//header("Location: login.php");
				}
	}
	public function borra()
	{
		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
			$consulta = "DELETE from usuario where id_usuario=$this->id";
			if ($linkSacadatos->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
	}
    
    	public function actual()
	{
	$conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();			
	$consulta = "UPDATE usuario SET nombre='$this->nombre', apellidopaterno='$this->apellidopaterno', apellidomaterno='$this->apellidomaterno', usuario='$this->usuario', contrasena='$this->contrasena', tipo='$this->tipo' where id_usuario=$this->id ";
			
			if ($linkSacadatos->query($consulta)){
			echo "<script>
alert('Actualizacion Guardada');
window.location.href='perfilcliente.php';
</script>";
											}
			else{
				header("Location: login.php");
				}
	}
    
}




/*include('config.php');
$nombre=$_POST["nombre"];
$paterno=$_POST["apellidopaterno"];
$materno=$_POST["apellidomaterno"];
$usuario=$_POST["usuario"];
$contra=$_POST["contrasena"];
$tipo=$_POST["tipo"];
if(isset($_POST["id"])){
	$id=$_POST["id"];
		$consulta = "UPDATE usuario SET nombre='$nombre', apellidopaterno='$paterno', apellidomaterno='$materno', usuario='$usuario',contrasena='$contra', tipo='$tipo' where id_usuario=$id ";
			if ($mysqli->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
					}
elseif (isset($_POST["ids"])){
	//$id=$_POST["id"];
		$consulta = "INSERT into usuario values('', '$nombre', '$paterno','$materno','$usuario', '$contra', '$tipo') ";
			if ($mysqli->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
}elseif (isset($_GET["borrar"])){
	$id=$_GET["borrar"];
	$consulta = "DELETE from usuario where id_usuario=$id ";
			if ($mysqli->query($consulta)){
				header("Location: admin.php");
											}
			else{
				header("Location: login.php");
				}
}else{  header("Location: admin.php"); }*/
?>