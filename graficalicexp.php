
        <link rel="stylesheet" href="graficas/samples/style.css" type="text/css">
        <script src="graficas/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="graficas/amcharts/funnel.js" type="text/javascript"></script>
        <script>

            var chart;

             <?php
        include_once('config.php');
        $conexionSacadatos = new Conexion();
        $mysqli = $conexionSacadatos->con();
     $consulta = "select usuario.nombre, count(*) as contador from expediente, usuario where expediente.id_licenciado=usuario.id_usuario group by expediente.id_licenciado";
        $resultado = $mysqli->query($consulta);
       
        $prefix = '';
echo "var data =[\n";
while ( $fila = $resultado->fetch_row() ) {
  echo $prefix . " {\n";
  echo '  "title": "' . $fila[0] . '",' . "\n";
  echo '  "value": ' . $fila[1] . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n];";
?>
       
            AmCharts.ready(function () {

                chart = new AmCharts.AmFunnelChart();
                chart.rotate = true;
                chart.titleField = "title";
                chart.balloon.fixedPosition = true;
                chart.marginRight = 210;
                chart.marginLeft = 15;
                chart.labelPosition = "right";
                chart.funnelAlpha = 0.9;
                chart.valueField = "value";
                chart.startX = -500;
                chart.dataProvider = data;
                chart.startAlpha = 0;
                chart.depth3D = 100;
                chart.angle = 30;
                chart.outlineAlpha = 1;
                chart.outlineThickness = 2;
                chart.outlineColor = "#FFFFFF";
                chart.write("chartdiv");
            });
        </script>
 
        <div id="chartdiv" style="width: 700px; height: 500px;"></div>
 