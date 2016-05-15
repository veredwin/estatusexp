 	<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de insertar asesorias. Ya que la inserta redirige a asistencias.php
*
*/

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
		 	header("Location: asistencias.php");
											}
			else{
				header("Location: login.php");
				}
	}

}

?>