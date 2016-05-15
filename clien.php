	<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de clientes manda llamar la informacion de la tabla a tablaclien.php.
*
*/

	if (isset($_GET['rfc'])){

$rfc="and cliente.rfc=\"".$_GET["rfc"]."\"";
	$nom="";
$pat="";
$mat="";
$est="";
$ciu="";
$cod="";
	$nombre="";
	$apellidopaterno="";
	$apellidomaterno="";
	$estado="";
	$ciudad="";
	$codpostal="";
}else{ 
	if (isset($_POST['nombre']) || isset($_POST['apellidopaterno']) || isset($_POST['apellidomaterno']) || isset($_POST['estado'])|| isset($_POST['ciudad']) || isset($_POST['codpostal'])){
		
		$revisar1=$_POST["nombre"];
		$revisar2=$_POST["apellidopaterno"];
		$revisar3=$_POST["apellidomaterno"];
		$revisar4=$_POST["estado"];
		$revisar5=$_POST["ciudad"];
		$revisar6=$_POST["codpostal"];

if ($revisar1!==""){ $nom="and usuario.nombre LIKE '%".$_POST["nombre"]."%'";
		
}else{$nom=$_POST["nombre"];}

if ($revisar2!==""){ $pat="and usuario.apellidopaterno LIKE '%".$_POST["apellidopaterno"]."%'";

}else{ $pat=$_POST["apellidopaterno"];}

if ($revisar3!==""){ $mat="and usuario.apellidomaterno LIKE '%".$_POST["apellidomaterno"]."%'";

}else{ $mat=$_POST["apellidomaterno"];}

if ($revisar4!==""){ $est="and direccion.estado LIKE '%".$_POST["estado"]."%'";

}else{ $est=$_POST["estado"];}

if ($revisar5!==""){ $ciu="and direccion.ciudad LIKE '%".$_POST["ciudad"]."%'";

}else{ $ciu=$_POST["ciudad"];}

if ($revisar6!==""){ $cod="and direccion.codpostal LIKE '%".$_POST["codpostal"]."%'";

}else{ $cod=$_POST["codpostal"];}



$nombre=$_POST["nombre"];
$apellidopaterno=$_POST["apellidopaterno"];
$apellidomaterno=$_POST["apellidomaterno"];
$estado=$_POST["estado"];
$ciudad=$_POST["ciudad"];
$codpostal=$_POST["codpostal"];
$rfc="";

}else{

$nom="";
$pat="";
$mat="";
$est="";
$ciu="";
$cod="";
	$nombre="";
	$apellidopaterno="";
	$apellidomaterno="";
	$estado="";
	$ciudad="";
	$codpostal="";
$rfc="";
}}

?>

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">Close</button>
                   
                </div>
                <div class="ct">
              
                </div>

            </div>
        </div>
    </div>

<!-- fin del modal -->

<div class="form-style-10">
		<form class="formulario" method="post" action="#">
			
			<div class="ad">
		        <label>Nombre<input type="text" name="nombre" value="<?php echo $nombre?>" require=""></label>
		        <label>A. Paterno <input type="text" name="apellidopaterno" value="<?php echo  $apellidopaterno?>" require=""></label>
            <br>
		        <label>A. Materno <input type="text" name="apellidomaterno" value="<?php echo  $apellidomaterno?>" require=""></label>
		             <label>Estado<input type="text" name="estado" value="<?php echo  $estado?>" require=""></label>
                <br>
		              <label>Ciudad<input type="text" name="ciudad" value="<?php echo  $ciudad?>" require=""></label>
		             
		                  <label>Codigo Postal<input type="text" name="codpostal" value="<?php echo  $codpostal?>" require=""></label>
                <br>
		        <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
		       
		    </div>
<center><button value="1" name="env" class="button"><span>Buscar</span></button><a href="cliente.php"><input type="button" value="Mostrar Todos" name="submit" class="botonrojo"/></a></center>
			
		</form>
					</div>



<div>

	<center>




		<table>
			<thead>	<tr>
				<th>Id</th>
				<th>Cliente</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>RFC</th>
				<th>Telefono</th>
				<th>Email</th>
				<th>Estado</th>
				<th>Ciudad</th>
				<th>Colonia</th>
				<th>Codigo Postal</th>
				<th>Calle</th>
				<th>Numero</th>
				<th>Modificar</th>
                	<th>Eliminar</th>
			</tr>		</thead>
					<tbody>	

			<?php
	include_once('tablaclien.php');
$tablas = new Tablas($nom,$pat,$mat,$est,$ciu,$cod,$rfc);
$tabla = $tablas->clientes();
			?>


			
   <div class="main-wrapper">
                    <a data-toggle="modal" data-target="#exampleModal" data-whatever="0">
                        <i class="material-icons"  style="font-size: 4rem">add</i>
                    </a>
                </div>
				

		</div>

		<!-- jQuery Version 1.11.0 -->
     <script src="js/jquery-latest.min.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id_us=' + recipient;
            $.ajax({
                type: "GET",
                url: "ediclien.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
    </script>
        
