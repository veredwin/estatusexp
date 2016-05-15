<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de expedientes manda llamar la informacion de la tabla a tablaexp.php.
*
*/

include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_GET['id_lic'])){

    $lic="and expediente.id_licenciado=\"".$_GET["id_lic"]."\"";
    $expediente="";
    $exp="";
    $juzgado="";
    $juicio="";
    $etapa="";
}else{


    if (isset($_POST['expediente']) || isset($_POST['juzgado']) || isset($_POST['juicio']) || isset($_POST['etapa'])){

        $revisar=$_POST["expediente"];

        if ($revisar!==""){
            $exp="and expediente.expediente LIKE '%".$_POST["expediente"]."%'";

        }else{
            $exp=$_POST["expediente"];

        }


        $juzgado=$_POST["juzgado"];
        $juicio=$_POST["juicio"];
        $etapa=$_POST["etapa"];
        $expediente=$_POST["expediente"];
        $lic="";
    }else{
        $expediente="";
        $exp="";
        $juzgado="";
        $juicio="";
        $etapa="";
        $lic="";
    }}


$consulta =" SELECT  	id_juzgado, juzgado  FROM  juzgado";
$resultadojuz = $mysqli->query($consulta);

$consulta =" SELECT  	id_juicio, juicio  FROM  juicio";
$resultadojui = $mysqli->query($consulta);

$consulta =" SELECT  	id_etapa, etapa  FROM  etapa";
$resultadoeta = $mysqli->query($consulta);

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

<div >

    <center>

        <!-- formulario de busquedas -->
        <div class="form-style-10">
            <form class="formulario" method="post" action="#">

                <div class="ad">
                    <label>Expediente<input type="text" name="expediente" value="<?php  echo $expediente ?>" require=""></label>
                    <br>
                    <label> Juzgado <select require="" name="juzgado">
                        <option  value=""  >Selecciona </option>
                        <?PHP
    while ($fila = $resultadojuz->fetch_row()){

        echo "<option value=\"and expediente.id_juzgado=".$fila['0']."\"> ".$fila['1']."</option>";
    }
                        ?>
                        </select>
                    </label>
                    <label> Juicio<select require="" name="juicio">
                        <option  value=""  >Selecciona </option>
                        <?PHP
                        while ($fila = $resultadojui->fetch_row()){

                            echo "<option value=\"and expediente.id_juicio=".$fila['0']."\"> ".$fila['1']."</option>";
                        }
                        ?>
                        </select>
                    </label>
                    <label> Etapa<select require="" name="etapa">
                        <option  value=""  >Selecciona </option>
                        <?PHP
                        while ($fila = $resultadoeta->fetch_row()){

                            echo "<option value=\"and expediente.id_etapa=".$fila['0']."\"> ".$fila['1']."</option>";
                        }
                        ?>
                        </select>
                    </label>


                </div>
                <center><button value="1" name="env" class="button"><span>Buscar</span></button><a href="expediente.php"><input type="button" value="Mostrar Todos" name="submit" class="botonrojo"/></a></center>

            </form>
        </div>

        <!-- FIN del formulario de busquedas -->


        <table>
            <thead>	<tr>
                <th>Id</th>
                <th>Expediente</th>
                <th>Juzgado</th>
                <th>Juicio</th>
                <th>Etapa</th>
                <th>Cliente</th>
                <th>Licenciado</th>
                
                <?php 
                       if ($tipo!="cliente") {
                           
                             echo  "<th>Modificar</th>";
                           echo  "<th>Eliminar</th>";
                       }
                ?>
            
                </tr>	
            </thead>
            <tbody>		

                <?php
                include_once('tablaexp.php');
                $tablas = new Tablas($exp,$juzgado,$juicio,$etapa,$lic);
                $tabla = $tablas->expedientes();
                ?>
            </div>

<center>
      <div class="main-wrapper">
                    <a data-toggle="modal" data-target="#exampleModal" data-whatever="0">
                        <i class="material-icons"  style="font-size: 4rem">add</i>
                    </a>
                </div>
</center>

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
                url: "ediexp.php",
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