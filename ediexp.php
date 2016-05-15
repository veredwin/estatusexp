<?php
// CREANDO MI CONEXION
include_once('config.php');
$conexionSacadatos = new Conexion();
$mysqli = $conexionSacadatos->con();

if (isset($_GET['id_us'])){
    $id=$_GET['id_us'];

    if ($id>0) {  
        $consulta = "SELECT expediente.id_expediente, expediente.expediente, juicio.juicio, juzgado.juzgado, etapa.etapa, expediente.id_cliente, expediente.id_licenciado FROM expediente, juicio, juzgado, etapa WHERE expediente.id_juicio=juicio.id_juicio and expediente.id_juzgado=juzgado.id_juzgado and expediente.id_etapa=etapa.id_etapa and id_expediente=$id";
        $resultado = $mysqli->query($consulta);
        
        
           $fila = $resultado->fetch_row();
        $s="";
        $id=$fila[0];
        $expediente=$fila[1];
        $juzgado=$fila[3];
        $juicio=$fila[2];
        $etapa=$fila[4];
        $cliente1=$fila[5];
        $licenciado1=$fila[6];
        
        $consulta1 =" SELECT rfc FROM  cliente where id_cliente=$cliente1";
$resultadoclien1 = $mysqli->query($consulta1);

                 $fila1 = $resultadoclien1->fetch_row();
      $cliente=$fila1[0];
           
$consulta2 =" SELECT  nombre FROM  usuario where id_usuario=$licenciado1";
$resultadolic2 = $mysqli->query($consulta2);
        
          $fila2 = $resultadolic2->fetch_row();

        $licenciado=$fila2[0];
     
    }else{
        $s="s";
        $id="";
        $expediente="";
        $juzgado="";
        $juicio="";
        $etapa="";
        $cliente="";
        $licenciado="";
    }}

include_once('actualizaexp.php');
if(isset($_POST["id"])){
    $insertando=new  NuevoRegistro($_POST["id"],$_POST["expediente"],$_POST["juzgado"],$_POST["juicio"], $_POST["etapa"], $_POST["cliente"], $_POST["licenciado"]);
    $insertando->actualiza();
}
elseif (isset($_POST["ids"])){
    $insertando=new  NuevoRegistro($_POST["ids"],$_POST["expediente"],$_POST["juzgado"],$_POST["juicio"], $_POST["etapa"], $_POST["cliente"], $_POST["licenciado"]);
    $insertando->inserta();
}elseif (isset($_GET["borrar"])){
    $insertando=new  NuevoRegistro($_GET["borrar"],0,0,0,0,0,0);
    $insertando->borra();
}else{  //header("Location: ejemplo2.php");
}
$consulta =" SELECT  	id_juzgado, juzgado  FROM  juzgado";
$resultadojuz = $mysqli->query($consulta);

$consulta =" SELECT  	id_juicio, juicio  FROM  juicio";
$resultadojui = $mysqli->query($consulta);

$consulta =" SELECT  	id_etapa, etapa  FROM  etapa";
$resultadoeta = $mysqli->query($consulta);

$consulta =" SELECT  	id_cliente, rfc FROM  cliente";
$resultadoclien = $mysqli->query($consulta);

$consulta =" SELECT  	id_usuario, nombre FROM  usuario where tipo='licenciado'";
$resultadolic = $mysqli->query($consulta);
?>
<div class="form-style-10">


    <form class="formulario" method="post" action="ediexp.php">

        <div>

            <h1>Expediente</h1>


            <div class="question">
                <input type="text" name="expediente" value="<?php echo $expediente?>" required=""><label>Expediente</label>
            </div>

            <br>
            
<div>
                
                 <select name="juzgado" id="sources" class="custom-select sources" placeholder="<?php if ($juzgado =="" ) {echo "Selecciona Juzgado";} else{
    $foo = ucwords($juzgado);
   echo $foo; }?> ">
      
                      <?PHP
    while ($fila = $resultadojuz->fetch_row()){

        echo "<option value='".$fila['0']."'";
        if ($juzgado ==$fila ['1'] ){ echo 'selected';}
        echo "> ".$fila['1']."</option>";
    }
                ?>
                     
  </select>
 
            </div><br>
            <div>
                        <select name="juicio" id="sources" class="custom-select sources" placeholder="<?php if ($juicio =="" ) {echo "Selecciona Juicio";} else{
    $foo = ucwords($juicio);
   echo $foo; }?> ">
      
                      <?PHP
    while ($fila = $resultadojui->fetch_row()){

        echo "<option value='".$fila['0']."'";
        if ($juicio ==$fila ['1'] ){ echo 'selected';}
        echo "> ".$fila['1']."</option>";
    }
                            
                            
                ?>
                     
  </select>
 
                    </div><br>
            <div>        
 <select name="etapa" id="sources" class="custom-select sources" placeholder="<?php if ($etapa =="" ) {echo "Selecciona Etapa";} else{
    $foo = ucwords($etapa);
   echo $foo; }?> ">
      
                      <?PHP
    while ($fila = $resultadoeta->fetch_row()){

        echo "<option value='".$fila['0']."'";
        if ($etapa ==$fila ['1'] ){ echo 'selected';}
        echo "> ".$fila['1']."</option>";
    }
                            
                            
                ?>
                     
  </select>     
                            </div><br>
            <div>
                
         <select name="cliente" id="sources" class="custom-select sources" placeholder="<?php if ($cliente =="" ) {echo "Selecciona Cliente";} else{
    $foo = ucwords($cliente);
   echo $foo; }?> ">
      
                      <?PHP
    while ($fila = $resultadoclien->fetch_row()){

        echo "<option value='".$fila['0']."'";
        if ($cliente ==$fila ['1'] ){ echo 'selected';}
        echo "> ".$fila['1']."</option>";
    }
                            
                            
                ?>
                     
  </select>  
                        </div><br>
            <div>
                
        <select name="licenciado" id="sources" class="custom-select sources" placeholder="<?php if ($licenciado =="" ) {echo "Selecciona licenciado";} else{
    $foo = ucwords($licenciado);
   echo $foo; }?> ">
      
                      <?PHP
    while ($fila = $resultadolic->fetch_row()){

        echo "<option value='".$fila['0']."'";
        if ($licenciado ==$fila ['1'] ){ echo 'selected';}
        echo "> ".$fila['1']."</option>";
    }
                            
                            
                ?>
                     
  </select>  
                
       
           
            <input type="hidden" name="id<?php echo $s;?>" value="<?php echo  $id;?>">
      </div>
        </div>
        <center><button value="1" name="env" class="button"><span>Actualizar</span></button></center>

    </form>
</div>

   <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>