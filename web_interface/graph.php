<?php
/*
  session_start();
  if($_SESSION["logged"] != true){
    header("location: loginpage.html");
    exit;
}
*/

$result = shell_exec('python3 /home/ronaldgrowe/mysite/environmental_controller/web_controller/graphlogin1.py');

$resultData = json_decode($result, true);
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="shortcut icon" href="enviroicon.png">
  <link href="styles/graphformat.css" rel="stylesheet" type="text/css" />


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawEnvironment);

function drawEnvironment() {
      var data1 = new google.visualization.DataTable();
      data1.addColumn('string', 'Date');
      data1.addColumn('number', 'Air Temperature');
      data1.addColumn('number', 'Humidity');

      data1.addRows(
        <?php echo $result; ?>
)

var options1 = {
        hAxis: {
          title: 'Hourly Temp Reading',
          logScale: false,
          slantedText: true,
          minTextSpacing: 10
        },
        vAxis: {
          title: 'Fahrenheit (F)',
          logScale: false
        },
 series: {
         0:{color: 'red'},
         1:{color: 'black'},
         2:{color: 'green'}
        },
	title: 'Environment',
	titleLocation: 'in',
        height: 400,
        colors: ['#a52714', '#097138']
     };

      var chart1 = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart1.draw(data1, options1);
    }
</script>

  <title>Environmental Conditions Graphed</title>

  </head>
  <body>

   <div id="chart_div">
   </div>
   <p></p>
   <div id="chart_divR">

   </div>
  </body>
</html>
