<?php
  session_start();
  if($_SESSION["logged"] != true){
    header("location: loginpage.html");
    exit;
}
?>
<?php
  $dberror="Failure";

  $db=mysql_connect("localhost","websiteData","ronjonjo") or die ($dberror);
  mysql_select_db('sensor_data',$db)or die($dberror);

  $result=mysql_query("SELECT * FROM TempData ORDER BY dtg DESC LIMIT 100");

  while($row = mysql_fetch_assoc($result)){
  $temp[] = $row['temp'];
  $temp2[] = $row['temp2'];
  $humidity[] = $row['humidity'];
  $humidity2[] = $row['humidity2'];
  $h2oTemp1[] = $row['h2oTemp1'];
  $h2oTemp2[] = $row['h2oTemp2'];
  $date = date_parse($row['dtg']);
  $hrs = "hrs";
  $slsh = "/";
  $dated = $date['hour'] . $hrs . $date['month'] . $slsh . $date['day'];
  $dtg[] = $dated;
}
?>
<!DOCTYPE html>
<html>
  <head>
<script src="https://code.highcharts.com"></script>

<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Monthly Average Temperature',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Temperature (°C)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Tokyo',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
        }, {
            name: 'New York',
            data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
        }, {
            name: 'Berlin',
            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
        }, {
            name: 'London',
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
});
</script>
  <body>
<div id="container" style="min-width: 750px; height: 750px; margin: 0 auto"></div>
  </body>
</html>


