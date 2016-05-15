<?php
$exp="";

 $tipo=$_SESSION["tipo"];

if (isset($_GET['id_exp'])){

$exp="where expediente.id_expediente=asesoria.id_expediente and asesoria.id_expediente=\"".$_GET["id_exp"]."\"";

}elseif ($tipo=="cliente"  ){

    

	$exp="where expediente.id_expediente=asesoria.id_expediente and expediente.id_cliente=".$_SESSION["cliente"];

}elseif ($tipo=="licenciado") {
   

	$exp="where expediente.id_expediente=asesoria.id_expediente and expediente.id_licenciado=".$_SESSION["usuario"];

}    
elseif ($tipo=="administrador") {
   

	$exp="where expediente.id_expediente=asesoria.id_expediente";

}  
?>

<div><center>
    
  <?php    if ($tipo!="cliente"  ){
    ?>
    			
   <div class="main-wrapper" style="margin-top:10px">
                     <a href="graficases.php">
                        <i class="material-icons"  style="font-size: 4rem">pie_chart</i>
                    </a>
                </div>
    
    
    <?php
}
    ?>
<table>
	<thead>	<tr>
		<th>Id</th>
		<th>Expediente</th>
		<th>Descripcion</th>
		<th>Fecha</th>
	</tr>	</thead>
					<tbody>			

<?php
include_once('tablaasis.php');
$tablas = new Tablas($exp);
$tabla = $tablas->asesorias();
                        
                        if ($tipo!="cliente"  ){
?>
                            <div class="main-wrapper">
                  <a href="principal.php">
                        <i class="material-icons"  style="font-size: 4rem">add</i>
                    </a>
                </div>
<?php
                        }
                        ?>
</center>
</div>
    
   