<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amCharts examples</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="../amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../amcharts/pie.js" type="text/javascript"></script>

        <script>
            var chart;
            <?php
        include_once('../../config.php');
        $conexionSacadatos = new Conexion();
        $mysqli = $conexionSacadatos->con();
     $consulta = "select usuario.nombre, count(*) as contador from expediente, usuario where expediente.id_licenciado=usuario.id_usuario group by expediente.id_licenciado";
        $resultado = $mysqli->query($consulta);
       
        $prefix = '';
echo "var chartData =[\n";
while ( $fila = $resultado->fetch_row() ) {
  echo $prefix . " {\n";
  echo '  "Lienciado": "' . $fila[0] . '",' . "\n";
  echo '  "Expedientes": ' . $fila[1] . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n];";
?>

            /*var chartData = [
                {
                    "Lienciado": "United States",
                    "Expedientes": 9252
                },
                {
                    "Lienciado": "China",
                    "Expedientes": 1882
                },
                {
                    "Lienciado": "Japan",
                    "Expedientes": 1809
                },
                {
                    "Lienciado": "Germany",
                    "Expedientes": 1322
                },
                {
                    "Lienciado": "United Kingdom",
                    "Expedientes": 1122
                },
                {
                    "Lienciado": "France",
                    "Expedientes": 1114
                },
                {
                    "Lienciado": "India",
                    "Expedientes": 984
                },
                {
                    "Lienciado": "Spain",
                    "Expedientes": 711
                }
            ];
*/

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();

                // title of the chart
                chart.addTitle("Expedientes por Licenciado", 16);

                chart.dataProvider = chartData;
                chart.titleField = "Lienciado";
                chart.valueField = "Expedientes";
                chart.sequencedAnimation = true;
                chart.startEffect = "elastic";
                chart.innerRadius = "30%";
                chart.startDuration = 2;
                chart.labelRadius = 15;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // the following two lines makes the chart 3D
                chart.depth3D = 10;
                chart.angle = 15;

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>

    <body>
        <div id="chartdiv" style="width:600px; height:400px;"></div>
    </body>

</html>