<?php
/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de encabezado.
*
*Se incia el body y se agrega el menu. Se revisa el tipo de sesion para dar acceso a solo lo otorgado.
*/
?>

<body >

  <nav id="menu">
    <center>
  <ul>
      <?php
                   
                    $tipo=$_SESSION["tipo"];
                    $usuario=$_SESSION["usuario"];
                    if($tipo=="administrador"){ ?>

    <li class="rocket"><a href="asistencias.php">Asesorias</a></li>
    <li class="wine"><a href="expediente.php">Expedientes</a></li>
    <li class="burger"><a href="abogados.php">Abogados</a></li>
    <li class="comment"><a href="cliente.php">Clientes</a></li>
    <li class="sport"><a href="admin.php">Administrar</a></li>
    <li class="earth"><a href="cerrarsesion.php">Salir</a></li>

 <?php } elseif ($tipo=="cliente") {
                        

                        include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

$consulta="SELECT cliente.id_cliente FROM cliente, usuario, usuariocliente where 
usuario.id_usuario=usuariocliente.id_usuario and cliente.id_cliente=usuariocliente.id_cliente 
and usuario.id_usuario=$usuario";
$resultado = $mysqli->query($consulta);
//echo $consulta;
while ($fila = $resultado->fetch_row()) {
           
          $cliente=$fila[0];

$_SESSION["cliente"]=$cliente;
        }
                     ?>



    <li class="rocket"><a href="bienvenido.php">Inicio</a></li>
    <li class="wine"><a href="perfilcliente.php">Perfil</a></li>
    <li class="burger"><a href="expediente.php">Expedientes</a></li>
      <li class="comment"><a href="asistencias.php">Asesorias</a></li>  
    <li class="sport"><a href="contacto.php">Contactar</a></li>
    <li class="earth"><a href="cerrarsesion.php">Salir</a></li>


 <?php } elseif ($tipo=="licenciado") {

$_SESSION["licenciado"]=$usuario;
                     ?>



    <li class="rocket"><a href="bienvenido.php">Inicio</a></li>
    <li class="wine"><a href="expediente.php">Expedientes</a></li>
    <li class="burger"><a href="cliente.php">Clientes</a></li>
    <li class="comment"><a href="asistencias.php">Asesorias</a></li>
      
    <li class="sport"><a href="perfilcliente.php">Perfil</a></li>
    <li class="earth"><a href="cerrarsesion.php">Salir</a></li>

                <?php }?>      
    <div class="current">
      <div class="top-arrow"></div>
      <div class="current-back"></div>
      <div class="bottom-arrow"></div>
    </div>
  </ul></center>
</nav>
       