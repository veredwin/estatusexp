<?php
// CREANDO MI CONEXION
include_once('config.php');

class NuevoRegistro 
{
	
	
	public $id;
	public $expediente;
	public $juzgado;
	public $juicio;
	public $etapa;
	public $cliente;
	public $licenciado;
	
	
	function __construct($id, $expediente, $juzgado, $juicio, $etapa, $cliente, $licenciado)
	{

	$this->id=$id;
	$this->expediente=$expediente;
	$this->juzgado=$juzgado;
	$this->juicio=$juicio;
	$this->etapa=$etapa;
	$this->cliente=$cliente;
	$this->licenciado=$licenciado;
	}
	public function actualiza()
	{
	$conexionSacadatos = new Conexion();
    $linkSacadatos = $conexionSacadatos->con();			
	$consulta = "UPDATE expediente SET expediente='$this->expediente', id_juzgado='$this->juzgado', id_juicio='$this->juicio', id_etapa='$this->etapa', id_cliente='$this->cliente', id_licenciado='$this->licenciado' WHERE  id_expediente=$this->id ";
			if ($linkSacadatos->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
	}
	public function inserta()
	{
		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
			$consulta = "INSERT into expediente values('', '$this->expediente', '$this->juzgado','$this->juicio','$this->etapa','$this->cliente', '$this->licenciado') ";
			if ($linkSacadatos->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
	}
	public function borra()
	{
		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
			$consulta = "DELETE from expediente WHERE id_expediente=$this->id";
			if ($linkSacadatos->query($consulta)){
					header("Location: expediente.php");
										}
			else{
				header("Location: login.php");
				}
	}
}
/*
$expediente=$_POST["expediente"];
$juzgado=$_POST["juzgado"];
$juicio=$_POST["juicio"];
$etapa=$_POST["etapa"];
if(isset($_POST["id"])){
	$id=$_POST["id"];
		$consulta = "UPDATE expediente, juicio, etapa, juzgado SET expediente='$expediente', juzgado='$juzgado', juicio='$juicio', etapa='$etapa' WHERE expediente.id_juicio=juicio.id_juicio and expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and id_expediente=$id ";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
					}
elseif (isset($_POST["ids"])){
	//$id=$_POST["id"];
		$consulta = "INSERT into expediente values('', '$expediente', '$juzgado','$juicio','$etapa') ";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
}elseif (isset($_GET["borrar"])){
	$id=$_GET["borrar"];
	$consulta = "DELETE from expediente WHERE id_expediente=$id";
			if ($mysqli->query($consulta)){
				header("Location: expediente.php");
											}
			else{
				header("Location: login.php");
				}
}else{  header("Location: expediente.php"); }*/
?>