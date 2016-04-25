<?php
// CREANDO MI CONEXION
include_once('config.php');
class NuevoRegistro
{

	public $id;
	public $nombre;
	public $apellidopaterno;
	public $apellidomaterno;
	public $rfc;
	public $telefono;
	public $email;
	public $estado;
	public $ciudad;
	public $colonia;
	public $codpostal;
	public $calle;
	public $numero;
	


	
	function __construct($id, $nombre, $apellidopaterno, $apellidomaterno, $rfc, $telefono, $email, $estado, $ciudad, $colonia, $codpostal, $calle, $numero)
	{

		$this->id=$id;
		$this->nombre=$nombre;
		$this->apellidopaterno=$apellidopaterno;
		$this->apellidomaterno=$apellidomaterno;
		$this->rfc= $rfc;
		$this->telefono= $telefono;
		$this->email= $email;
		$this->estado= $estado;
		$this->ciudad= $ciudad;
		$this->colonia= $colonia;
		$this->codpostal=$codpostal;
		$this->calle= $calle;
		$this->numero= $numero;
	}
	public function actualiza()
	{
		$conexionSacadatos = new Conexion();
		$linkSacadatos = $conexionSacadatos->con();			
		$consulta = "UPDATE usuario, cliente, direccion, usuariocliente SET nombre='$this->nombre', apellidopaterno='$this->apellidopaterno', apellidomaterno='$this->apellidomaterno', rfc='$this->rfc', telefono='$this->telefono', email='$this->email', estado='$this->estado', ciudad='$this->ciudad', colonia='$this->colonia', codpostal='$this->codpostal', calle='$this->calle', numero='$this->numero'  where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and cliente.id_cliente=direccion.id_cliente and cliente.id_cliente=$this->id ";
		if ($linkSacadatos->query($consulta)){
			header("Location: cliente.php");
		}
		else{
			header("Location: login.php");
		}
	}
	public function inserta()
	{
		$conexionSacadatos = new Conexion();
		$linkSacadatos = $conexionSacadatos->con();
		$consulta = "INSERT INTO usuario (`id_usuario`, `nombre`, `apellidopaterno`, `apellidomaterno`, `usuario`, `contrasena`, `tipo`) VALUES (NULL, '$this->nombre', '$this->apellidopaterno', '$this->apellidomaterno', '$this->nombre', '1234', 'cliente');";
		if ($linkSacadatos->query($consulta)){
			$consulta = "INSERT INTO cliente (`id_cliente`, `rfc`, `telefono`, `email`) VALUES (NULL, '$this->rfc', '$this->telefono', '$this->email');";
			if ($linkSacadatos->query($consulta)){

				$linkSacadatos1 = $conexionSacadatos->con();

				$consulta1 = "select id_cliente FROM cliente where rfc='$this->rfc'";
				$resultado1 = $linkSacadatos1->query($consulta1);
				$fila1 = $resultado1->fetch_row();
				$id_clientes=$fila1[0];

				$consulta = "INSERT INTO direccion (`id_direccion`, `estado`, `ciudad`, `colonia`, `codpostal`, `calle`, `numero`, `id_cliente`) VALUES (NULL, '$this->estado', '$this->ciudad', '$this->colonia', '$this->codpostal', '$this->calle', $this->numero, $id_clientes)";
				if ($linkSacadatos->query($consulta)){

					$consulta2 = "select id_usuario FROM usuario where nombre='$this->nombre' and apellidopaterno='$this->apellidopaterno' and apellidomaterno='$this->apellidomaterno'";
					$resultado2 = $linkSacadatos->query($consulta2);
					$fila2 = $resultado2->fetch_row();
					$id_usuarios=$fila2[0];

					$consulta = "INSERT INTO usuariocliente (`id_usuariocliente`, `id_usuario`, `id_cliente`) VALUES (NULL, '$id_usuarios', '$id_clientes');";
					if ($linkSacadatos->query($consulta)){

						header("Location: cliente.php");
					}
					else{
						header("Location: login.php");
					}
				}
				else{
					header("Location: login.php");
				}
			}
			else{
				header("Location: login.php");
			}
		}
		else{
			header("Location: login.php");
		}
	}
	public function borra()
	{
		$conexionSacadatos = new Conexion();
		$linkSacadatos = $conexionSacadatos->con();
		$consulta = "select id_usuario FROM usuariocliente where id_cliente=$this->id";
		$resultado = $linkSacadatos->query($consulta);
		$fila = $resultado->fetch_row();


		while ($fila = $resultadojuz->fetch_row()){

		$id_usuarios=$fila[0];

		$consulta = "delete FROM usuario where id_usuario=$id_usuarios";
		
		}
		if ($linkSacadatos->query($consulta)){
		$consulta = "delete from cliente where id_cliente=$this->id";
		if ($linkSacadatos->query($consulta)){
		header("Location: cliente.php");
	}
	else{
	header("Location: login.php");
}
}
else{
header("Location: login.php");
}

}
}

/*
include('config.php');
$nombre=$_POST["nombre"];
$apellidopaterno=$_POST["apellidopaterno"];
$apellidomaterno=$_POST["apellidomaterno"];
$rfc=$_POST["rfc"];
$telefono=$_POST["telefono"];
$email=$_POST["email"];
$estado=$_POST["estado"];
$ciudad=$_POST["ciudad"];
$colonia=$_POST["colonia"];
$codpostal=$_POST["codpostal"];
$calle=$_POST["calle"];
$numero=$_POST["numero"	];
if(isset($_POST["id"])){
$id=$_POST["id"];
$consulta = "UPDATE usuario, cliente, direccion, usuariocliente SET nombre='$nombre', apellidopaterno='$apellidopaterno', apellidomaterno='$apellidomaterno', rfc='$rfc', telefono='$telefono', email='$email', estado='$estado', ciudad='$ciudad', colonia='$colonia', codpostal='$codpostal', calle='$calle', numero='$numero'  where usuariocliente.id_usuario=usuario.id_usuario and usuariocliente.id_cliente=cliente.id_cliente and cliente.id_cliente=direccion.id_cliente and cliente.id_cliente=$id ";
if ($mysqli->query($consulta)){
header("Location: cliente.php");
}
else{
header("Location: login.php");
}
}
elseif (isset($_POST["ids"])){
//$id=$_POST["id"];
$consulta = "INSERT into expediente values('', '$', '$juzgado','$juicio','$etapa') ";
if ($mysqli->query($consulta)){
header("Location: expediente.php");
}
else{
header("Location: login.php");
}
}elseif (isset($_GET["borrar"])){
$id=$_GET["borrar"];
$consulta = "DELETE from expediente WHERE id_expediente=$";
if ($mysqli->query($consulta)){
header("Location: expediente.php");
}
else{
header("Location: login.php");
}
}else{  header("Location: expediente.php"); }*/
?>