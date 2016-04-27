 	<?php
// CREANDO MI CONEXION

include_once('config.php');
class NuevoRegistro 
{
	
	

	public $expediente;
	public $etapa;
	public $descripcion;
	public $fecha;
	
	function __construct($expediente, $etapa, $descripcion)
	{

	$this->id=$id;
	$this->expediente=$expediente;
	$this->etapa=$etapa;
	$this->descripcion=$descripcion;
	}

	public function inserta()
	{
		$conexionSacadatos = new Conexion();
   		$linkSacadatos = $conexionSacadatos->con();
			$consulta = "INSERT into asesoria values('', '$this->descripcion', CURRENT_TIMESTAMP,'$this->expediente') ";
			if ($linkSacadatos->query($consulta)){
				header("Location: principal.php");
											}
			else{
				header("Location: login.php");
				}
	}

}

?>