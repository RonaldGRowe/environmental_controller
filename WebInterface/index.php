<!--<?php
  session_start();
  if($_SESSION["logged"] != true){ 
    header("location: loginpage.html");
    exit;
}
?>

<?php

$data = array("your in");
$result = shell_exec('python "/website/mysite/sensors/tempread.py" ' . escapeshellarg(json_encode($data)));
$reading = json_decode($result, true);


$relaystatus = shell_exec('python "/website/mysite/sensors/webrelaystatus.py" ' . escapeshellarg(json_encode($data)));
$resultData = json_decode($relaystatus, true);
?>
-->
<!DOCTYPE html>
<html>

<head>
<!--
      Controller Readings 
      Hosted by Rasp Pi

      Hydroponic Info
      Author: Ronald Rowe
      Date:   5/31/2015

      Filename:         index.php
      
   -->
	  <link href="controllerstyle.css" rel="stylesheet" type="text/css" />
      <meta charset="UTF-8" />
      <title>Raspberry Pi Controller</title>
      
      
      
      
      
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["gauge"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var dataLpH = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['pH', <?php echo $reading[6];?>],
        ]);

        var optionsLpH = {
          width: 400, height: 120, max: 14,
          greenFrom: 5, greenTo: 7,
          minorTicks: 10
        };

        var chartLpH = new google.visualization.Gauge(document.getElementById('chartLpH_div'));

        chartLpH.draw(dataLpH, optionsLpH);


		var dataRpH = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['pH', 7],
        ]);

        var optionsRpH = {
          width: 400, height: 120, max: 14,
          greenFrom: 5, greenTo: 7,
          minorTicks: 10
         };

        var chartRpH = new google.visualization.Gauge(document.getElementById('chartRpH_div'));

        chartRpH.draw(dataRpH, optionsRpH);



		var dataLTDS = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['TDS', 1000],
        ]);

        var optionsLTDS = {
          width: 400, height: 120, max: 2000,
          redFrom: 1500, redTo: 2000,
          yellowFrom:1000, yellowTo: 1500,
          minorTicks: 10
        };

        var chartLTDS = new google.visualization.Gauge(document.getElementById('chartLTDS_div'));

        chartLTDS.draw(dataLTDS, optionsLTDS);



		var dataRTDS = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['TDS', 1000],
        ]);

        var optionsRTDS = {
          width: 400, height: 120, max: 2000,
          redFrom: 1500, redTo: 2000,
          yellowFrom:1000, yellowTo: 1500,
          minorTicks: 10
        };

        var chartRTDS = new google.visualization.Gauge(document.getElementById('chartRTDS_div'));

        chartRTDS.draw(dataRTDS, optionsRTDS);
      }
    </script>
</head>

<body>
<br/>
	<header>
		<h1>Hydroponic Grow</h1>
	</header>
	<br/>
	<aside class="right">
                <h2>Right Side</h2>
                <div class="air">
                        <h5>Air Temp</h5>
                        <p><?php echo $reading[2];?>&deg;F</p>
                </div>
                <div class="lights">
	 <h5>Lights</h5>
                         <input type="button" onclick="location='try2.php';" value='<?php echo $resultData[1];?>'>
                </div>
                <div class="humidity">
                        <h5>Humidity</h5>
                        <p><?php echo $reading[3];?>%</p>
                </div>
                <div class="water">
                        <h5>Water Temp</h5>
                        <p><?php echo $reading[5];?>&deg;F</p>
                </div>
                <div id="chartRpH_div" class="ph">
                </div>
                <div id="chartRTDS_div" class="tds">
                </div>
        </aside>
	<section class="left">
		<h2>Left Side</h2>
		<div class="air">
			<h5>Air Temp</h5>
			<p><?php echo $reading[0];?>&deg;F</p>
		</div>
		<div class="lights">
			<h5>Lights</h5>
			<input type="button" onclick="location='try1.php';" value='<?php echo $resultData[2];?>'>
		</div>
                <div class="humidity">
			<h5>Humidity</h5>
			<p><?php echo $reading[1];?>%</p>
		</div>
		<div class="water">
			<h5>Water Temp</h5>
			<p><?php echo $reading[4];?>&deg;F</p>
		</div>
		<div id="chartLpH_div" class="ph">
		</div>
		<div id="chartLTDS_div" class="tds">
		</div>
	</section>
        <div class="fan">
                <h2>Fan</h2>
                <input type="button" onclick="location='try.php';" value='<?php echo $resultData[0];?>'>
                <h2>Dripper</h2>
                <input type="button" onclick="location='try3.php';" value='<?php echo $resultData[3];?>'>
                <h2>DripperR</h2>
                <input type="button" onclick="location='try4.php';" value='<?php echo $resultData[4];?>'>


		<h2>96HR</h2>
                <input type="button" onclick="location='graph.php';" value='Graph'>
        </div>

</body>

</html>

