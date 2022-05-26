
<?php
exec('python3 /home/ronaldgrowe/mysite/environmental_controller/web_controller/camera.py');
$relaystatus = shell_exec('python3 /home/ronaldgrowe/mysite/environmental_controller/web_controller/web_relay_status.py');
$resultData = json_decode($relaystatus, true);


$result = shell_exec('python3 /home/ronaldgrowe/mysite/environmental_controller/web_controller/web_live_cond.py');

if(! $result){
    echo "Sorry you had to wait, Sensor Traffic is Heavy Today";
    sleep(3);
    $result = shell_exec('python3 /home/ronaldgrowe/mysite/environmental_controller/web_controller/web_live_cond.py');
}
$reading = json_decode($result, true);


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
  <link rel="shortcut icon" href="enviroicon.png">
  <link href="styles/controllerstyle.css" rel="stylesheet" type="text/css" />
  <meta charset="UTF-8" />
  <title>Pi Controller</title>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script>
function scrollImage() {
  location.href = "#picture";
  setTimeout(update, 2000);
}

function update() {
  var timestamp = new Date().getTime();
  var src = 'pic1.jpg';
  var newsrc = src + '?_=' + timestamp;
  document.getElementById("pic1").src = newsrc;
}
/*
  async function getText(){
    let myObject = await fetch("cycleseclight.php");
    let myText = await myObject.text();
    alert(myText);
    document.getElementById("seclight").innerHTML = myText;
    setTimeout(update, 3500);
}
*/
    $(document).ready(function(){
      $("#light").click(function(){
        $("#light").load("cyclelight.php"
/*
          function(response, status, http){
            if(status == "success")
              alert("Content loaded successfully");
            if(status == "error")
              alert("Error: " + http.status + ": " + http.statusText + " " +response);

      }
*/
);
      });

      $("#seclight").click(function(){
        $("#seclight").load("cycleseclight.php");
      });

      $("#drip").click(function(){
        $("#drip").load("cycledrip.php");
      });

      $("#secdrip").click(function(){
        $("#secdrip").load("cyclesecdrip.php");
      });

      $("#fan").click(function(){
        $("#fan").load("cyclefan.php");
      });

    });

</script>



</head>
<body>
<br/>
	<header>
		<h1>Environmental Controller</h1>
                <p>Click around and try it out!</p>
	</header>
	<br/>
	<aside class="right">
                <h2>Right Side</h2>
                <div class="air">
                        <h5>Air Temp</h5>
                        <p><?php echo $reading["secairtemp"];?>&deg;F</p>
                </div>
                <div class="lights">
	                 <h5>Lights</h5>
                         <button id="seclight" onclick="setTimeout(scrollImage, 1500)"><?php echo $resultData["seclight"];?></button>
                </div>
                <div class="humidity">
                        <h5>Humidity</h5>
                        <p><?php echo $reading["sechumidity"];?>%</p>
                </div>
                <div class="water">
                        <h5>Water Temp</h5>
                        <p><?php echo $reading["secwatertemp"];?>&deg;F</p>
                </div>
                <div id="chartRpH_div" class="ph">
                </div>
        </aside>
	<section class="left">
		<h2>Left Side</h2>
		<div class="air">
			<h5>Air Temp</h5>
			<p><?php echo $reading["airtemp"];?>&deg;F</p>
		</div>
		<div class="lights">
			<h5>Lights</h5>
                        <button id="light" onclick="setTimeout(scrollImage, 1500)"><?php echo $resultData["light"];?></button>
		</div>
                <div class="humidity">
			<h5>Humidity</h5>
			<p><?php echo $reading["humidity"];?>%</p>
		</div>
		<div class="water">
			<h5>Water Temp</h5>
			<p><?php echo $reading["watertemp"];?>&deg;F</p>
		</div>
		<div id="chartLpH_div" class="ph">
		</div>
	</section>
        <div class="fan">
                <h2>Fan</h2>
                <button id="fan" onclick="setTimeout(scrollImage, 1500)"><?php echo $resultData["fan"];?></button>
                <h2>RunDrip</h2>
                <button id="drip" onclick="setTimeout(scrollImage, 1500)"><?php echo $resultData["drip"];?></button>
                <h2>RunDrip2</h2>
                <button id="secdrip" onclick="setTimeout(scrollImage, 1500)"><?php echo $resultData["secdrip"];?></button>
		<h2>24Hr Data</h2>
                <button onclick="window.open('graph.php', '_blank')">Graph</button>
        </div>
        <br>
        <div id="picture">
            <img src="pic1.jpg" id="pic1" alt="pic1" onerror="setTimeout(update, 1000)">
        </div>


</body>

</html>
