

<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de usuarios. Manda llamar la informacion de la tabla "tablaadmin.php"
*
*/

if (isset($_POST['nombre']) || isset($_POST['tipo'])){

    $revisar=$_POST["nombre"];

    if ($revisar!=""){
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
    <form  class="formulario" method="post" action="#">

 
             <div class="question">
            <input type="text" name="nombre" value="<?php echo $nombre;?>" />
            <label>Nombre</label>
        </div>
            <br>
<select name="tipo" id="sources" class="custom-select sources" placeholder="Elige una Opcion">
       <option value="<?php echo "and usuario.tipo='administrador'";?>" >Administrador</option>
                <option value="<?php echo "and usuario.tipo='cliente'";?>"  >Cliente</option>
                <option value="<?php echo "and usuario.tipo='licenciado'";?>"  >Licenciado</option>
  </select>
            
           


        <center><button value="1" name="env" class="button"><span>Buscar</span></button><a href="admin.php"><input type="button" value="Mostrar Todos" name="submit" class="botonrojo"/></a></center>

    </form>
</div>
<div>

    <center>
        <table>
            <thead>	<tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>	</thead>
            <tbody>	

                <?php
    include_once('tablaadmin.php');
                                $tablas = new Tablas($nom,$tipo);
                                $tabla = $tablas->usuarios();
                ?>

                <div class="main-wrapper">
                    <a data-toggle="modal" data-target="#exampleModal" data-whatever="0">
                        <i class="material-icons"  style="font-size: 4rem">add</i>
                    </a>
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
        
