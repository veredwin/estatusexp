<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amCharts examples</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="../amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../amcharts/funnel.js" type="text/javascript"></script>
        <script>

            var chart;

             <?php
        include_once('../../config.php');
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
         /*   var data = [
                {
                    "title": "Website visits",
                    "value": 200
                },
                {
                    "title": "Downloads",
                    "value": 123
                },
                {
                    "title": "Requested price list",
                    "value": 98
                },
                {
                    "title": "Contaced for more info",
                    "value": 72
                },
                {
                    "title": "Purchased",
                    "value": 65
                },
                {
                    "title": "Contacted for support",
                    "value": 45
                },
                {
                    "title": "Purchased additional products",
                    "value": 36
                }
			];*/

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
    </head>

    <body>
        <div id="chartdiv" style="width: 700px; height: 500px;"></div>
    </body>

</html>