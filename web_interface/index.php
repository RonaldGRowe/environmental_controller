
  <?php/*
  session_start();
  if($_SESSION["logged"] != true){ 
    header("location: loginpage.html");
    exit;
}
*/?>

<?php

$data = array("your in");
$result = shell_exec('python "/website/mysite/sensors/web_live_condition.py" ' . escapeshellarg(json_encode($data)));
$reading = json_decode($result, true);


$relaystatus = shell_exec('python "/website/mysite/sensors/web_relay_status.py" ' . escapeshellarg(json_encode($data)));
$resultData = json_decode($relaystatus, true);
?>

<!DOCTYPE html>
<html>

<head>
<!--
      Controller Readings 
      Hosted by Rasp Pi

      Environment Info
      Author: Ronald Rowe
      Date:   5/31/2015
      Updated: 3/23/2022

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
          ['pH', 6.8],
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
          ['pH', 6.5],
        ]);

        var optionsRpH = {
          width: 400, height: 120, max: 14,
          greenFrom: 5, greenTo: 7,
          minorTicks: 10
         };

        var chartRpH = new google.visualization.Gauge(document.getElementById('chartRpH_div'));

        chartRpH.draw(dataRpH, optionsRpH);




      }
    </script>
</head>

<body>
<br/>
	<header>
		<h1>Environmental Controller</h1>
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
                         <input type="button" onclick="location='cycleseclight.php';" value='<?php echo $resultData[1];?>'>
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
        </aside>
	<section class="left">
		<h2>Left Side</h2>
		<div class="air">
			<h5>Air Temp</h5>
			<p><?php echo $reading[0];?>&deg;F</p>
		</div>
		<div class="lights">
			<h5>Lights</h5>
			<input type="button" onclick="location='cyclelight.php';" value='<?php echo $resultData[2];?>'>
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
	</section>
        <div class="fan">
                <h2>Fan</h2>
                <input type="button" onclick="location='cyclefan.php';" value='<?php echo $resultData[0];?>'>
                <h2>RunDrip</h2>
                <input type="button" onclick="location='cycledrip.php';" value='<?php echo $resultData[3];?>'>
                <h2>RunDrip2</h2>
                <input type="button" onclick="location='cyclesecdrip.php';" value='<?php echo $resultData[4];?>'>


		<h2>24Hr</h2>
                <input type="button" onclick="location='graph.php';" value='Graph'>
        </div>

</body>

</html>

