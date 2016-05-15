<?php

/**
* @author Edwin Humberto Vergara Beltrán
* @version 1.0
* 
* Modulo de tabla de usuarios, carga los usuarios con una consulta en la base de datos. Los usuarios se reflejan en una tabla.
*
*Aqui se ponen restricciones por tipo de usuario.
*
*/

include_once('config.php');
class  Tablas{
    public $nom;
    public $tipo;
    function __construct($nom,$tipo)
    {
        $this->nom=$nom;
        $this->tipo=$tipo;
    }
    public function usuarios(){
        $conexionSacadatos = new Conexion();
        $mysqli = $conexionSacadatos->con();
        $mysqli->set_charset("utf8");
        $consulta = "SELECT * from usuario where id_usuario>=1 $this->nom $this->tipo";

        //echo $consulta;
        $resultado = $mysqli->query($consulta);

        $i=0;
        while ($fila = $resultado->fetch_row()) {   

            echo "<tr>";
            echo "<td>".$fila[0]."</td><td>".$fila[4]."</td><td>".$foo = ucwords($fila[1])."</td><td>".$foo = ucwords($fila[6])."</td>
<td><center>
   <div class=\"main-wrapper2\">

<a  data-toggle='modal' data-target='#exampleModal' data-whatever=".$fila[0]."> <i class=\"material-icons\">edit</i></a>
</div></center>
</td>
<td><center>
  <div class=\"main-wrapper2\">
<a href=edicion.php?borrar=".$fila[0]."> <i class=\"material-icons\">&#xE872</i></a>
</div>
</center></td>";
            echo "</tr>";
            $i++;
        }
        echo "</tbody>";
        echo "</table>";
    }
}
?>