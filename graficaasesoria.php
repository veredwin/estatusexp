
        <link rel="stylesheet" href="graficas/samples/style.css" type="text/css">
        <script src="graficas/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="graficas/amcharts/funnel.js" type="text/javascript"></script>
      <script src="graficas/amcharts/serial.js" type="text/javascript"></script>
           <script>
            var chart;
                  <?php
        include_once('config.php');
        $conexionSacadatos = new Conexion();
        $mysqli = $conexionSacadatos->con();
     $consulta = "SELECT  DATE_FORMAT(fecha,'%Y-%m-%d') AS fecha, COUNT(id_asesoria) AS asesorias FROM asesoria GROUP BY DATE_FORMAT(FECHA, '%Y%m%d')";
        $resultado = $mysqli->query($consulta);
       
        $prefix = '';
echo "chartData =[\n";
while ( $fila = $resultado->fetch_row() ) {
  echo $prefix . " {\n";
  echo '  "date": "' . $fila[0] . '",' . "\n";
  echo '  "price": ' . $fila[1] . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n];";
?>

            var average = 90.4;

            AmCharts.ready(function () {

                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();

                chart.dataProvider = chartData;
                chart.categoryField = "date";
                chart.dataDateFormat = "YYYY-MM-DD";

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "DD"; // our data is daily, so we set minPeriod to DD
                categoryAxis.dashLength = 1;
                categoryAxis.gridAlpha = 0.15;
                categoryAxis.axisColor = "#DADADA";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisColor = "#DADADA";
                valueAxis.dashLength = 1;
                valueAxis.logarithmic = true; // this line makes axis logarithmic
                chart.addValueAxis(valueAxis);

                // GUIDE for average
                var guide = new AmCharts.Guide();
                guide.value = average;
                guide.lineColor = "#CC0000";
                guide.dashLength = 4;
                guide.label = "average";
                guide.inside = true;
                guide.lineAlpha = 1;
                valueAxis.addGuide(guide);


                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.type = "smoothedLine";
                graph.bullet = "round";
                graph.bulletColor = "#FFFFFF";
                graph.useLineColorForBulletBorder = true;
                graph.bulletBorderAlpha = 1;
                graph.bulletBorderThickness = 2;
                graph.bulletSize = 7;
                graph.title = "Price";
                graph.valueField = "price";
                graph.lineThickness = 2;
                graph.lineColor = "#00BBCC";
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorPosition = "mouse";
                chart.addChartCursor(chartCursor);

                // SCROLLBAR
                var chartScrollbar = new AmCharts.ChartScrollbar();
                chartScrollbar.graph = graph;
                chartScrollbar.scrollbarHeight = 30;
                chart.addChartScrollbar(chartScrollbar);

                chart.creditsPosition = "bottom-right";

                // WRITE
                chart.write("chartdiv");
            });
        </script>
 
       <center>  <div id="chartdiv" style="width: 100%; height: 400px;"></div></center>
 