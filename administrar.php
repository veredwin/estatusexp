

<?php
if (isset($_POST['nombre']) || isset($_POST['tipo'])){

	$revisar=$_POST["nombre"];

	if ($revisar!==""){
$nom="and usuario.nombre LIKE '%".$_POST["nombre"]."%'";

	}else{
$nom=$_POST["nombre"];

	}
	
$nombre=$_POST["nombre"];
	$tipo=$_POST["tipo"];
	
}else{
	$nombre="";
	$nom="";
	$tipo="";
}
$todo= $nombre." ".$tipo;

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

<!-- formulario de busquedas -->
		<div class="form-style-10">
			<form method="post" action="#">

				<div class="ad">
					<label>Nombre<input type="text" name="nombre" value="<?php  echo $nombre ?>" require=""></label>
					
					 <label>Tipo <select require="" name="tipo">
						<option value="">Elige una Opcion</option>
						<option value="and usuario.tipo=&quot;administrador&quot;" >Administrador</option>
						<option value="and usuario.tipo=&quot;cliente&quot;" >Cliente</option>
						<option value="and usuario.tipo=&quot;licenciado&quot;" >Licenciado</option>
						</select>
		        </label>
				
		

	</div>
	<center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>

</form>
</div>
<div>
		
			<center>
			<table class="responstable">
<thead>	<tr>
					<th>Id</th>
					<th>Usuario</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Opciones</th>
					</tr>		

			<?php
include_once('tablaadmin.php');
$tablas = new Tablas($nom,$tipo);
$tabla = $tablas->usuarios();
			?>


			<a data-toggle="modal" data-target="#exampleModal" data-whatever="0"><button type="submit" class="button" data-target="#exampleModal" style="margin-bottom: 30%;"><span>Agregar</span></button></a>
				
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
                url: "edicion.php",
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