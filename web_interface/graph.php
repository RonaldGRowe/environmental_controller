<?php
/*
  session_start();
  if($_SESSION["logged"] != true){
    header("location: loginpage.html");
    exit;
}
*/
?>


<?php
  $dberror="Failure";

  $db=mysql_connect("localhost","user","password") or die ($dberror);
  mysql_select_db('temperaturehumidityreadings',$db)or die($dberror);
  $result=mysql_query("SELECT * FROM readings ORDER BY dtg DESC LIMIT 100");


  while($row = mysql_fetch_assoc($result)){
  $Dtemp[] = $row['temperature'];
  /*$Dtemp2[] = $row['temp2'];*/
  $Dhumidity[] = $row['humidity'];
  /*$Dhumidity2[] = $row['humidity2'];
  $Dh2oTemp1[] = $row['h2oTemp1'];
  $Dh2oTemp2[] = $row['h2oTemp2'];*/
  $datel[] = $row['dtg'];
  $date = date_parse($row['dtg']);
  $colon = ":";
  $slsh = "/";
  $dated = $date['hour'] . $colon . $date['minute'] . $date['month'] . $slsh . $date['day'];
  $Ddtg[] = $dated;
}
  mysql_free_result($result);
  mysql_close($db);

  for ($x = 0; $x < 100; $x++){
  $y = 99-$x;
  $humidity[$y] = $Dhumidity[$x];
  /*$humidity2[$y] = $Dhumidity2[$x];*/
  $temp[$y] = $Dtemp[$x];
  /*$temp2[$y] =$Dtemp2[$x];*/
  $h2oTemp1[$y] = $Dtemp[$x] - 5;
 /* $h2oTemp2[$y] = $Dh2oTemp2[$x];*/
  $dtg[$y] = $Ddtg[$x];
}

?>

<!DOCTYPE html>
<html>
  <head>
  <link href="styles/graphformat.css" rel="stylesheet" type="text/css" />


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

  google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawLogScales);

function drawLogScales() {
      var data1 = new google.visualization.DataTable();
      data1.addColumn('string', 'Date');
      data1.addColumn('number', 'Air Temperature');
      data1.addColumn('number', 'H20 Temperature');
      data1.addColumn('number', 'Humidity');

      data1.addRows([
['<?php echo $dtg[0];?>', <?php echo $temp[0];?>, <?php echo $h2oTemp1[0];?>, <?php echo $humidity[0];?>],
['<?php echo $dtg[1];?>', <?php echo $temp[1];?>, <?php echo $h2oTemp1[1];?>, <?php echo $humidity[1];?>],
['<?php echo $dtg[2];?>', <?php echo $temp[2];?>, <?php echo $h2oTemp1[2];?>, <?php echo $humidity[2];?>],
['<?php echo $dtg[3];?>', <?php echo $temp[3];?>, <?php echo $h2oTemp1[3];?>, <?php echo $humidity[3];?>],
['<?php echo $dtg[4];?>', <?php echo $temp[4];?>, <?php echo $h2oTemp1[4];?>, <?php echo $humidity[4];?>],
['<?php echo $dtg[5];?>', <?php echo $temp[5];?>, <?php echo $h2oTemp1[5];?>, <?php echo $humidity[5];?>],
['<?php echo $dtg[6];?>', <?php echo $temp[6];?>, <?php echo $h2oTemp1[6];?>, <?php echo $humidity[6];?>],
['<?php echo $dtg[7];?>', <?php echo $temp[7];?>, <?php echo $h2oTemp1[7];?>, <?php echo $humidity[7];?>],
['<?php echo $dtg[8];?>', <?php echo $temp[8];?>, <?php echo $h2oTemp1[8];?>, <?php echo $humidity[8];?>],
['<?php echo $dtg[9];?>', <?php echo $temp[9];?>, <?php echo $h2oTemp1[9];?>, <?php echo $humidity[9];?>],
['<?php echo $dtg[10];?>', <?php echo $temp[10];?>, <?php echo $h2oTemp1[10];?>, <?php echo $humidity[10];?>],
['<?php echo $dtg[11];?>', <?php echo $temp[11];?>, <?php echo $h2oTemp1[11];?>, <?php echo $humidity[11];?>],
['<?php echo $dtg[12];?>', <?php echo $temp[12];?>, <?php echo $h2oTemp1[12];?>, <?php echo $humidity[12];?>],
['<?php echo $dtg[13];?>', <?php echo $temp[13];?>, <?php echo $h2oTemp1[13];?>, <?php echo $humidity[13];?>],
['<?php echo $dtg[14];?>', <?php echo $temp[14];?>, <?php echo $h2oTemp1[14];?>, <?php echo $humidity[14];?>],
['<?php echo $dtg[15];?>', <?php echo $temp[15];?>, <?php echo $h2oTemp1[15];?>, <?php echo $humidity[15];?>],
['<?php echo $dtg[16];?>', <?php echo $temp[16];?>, <?php echo $h2oTemp1[16];?>, <?php echo $humidity[16];?>],
['<?php echo $dtg[17];?>', <?php echo $temp[17];?>, <?php echo $h2oTemp1[17];?>, <?php echo $humidity[17];?>],
['<?php echo $dtg[18];?>', <?php echo $temp[18];?>, <?php echo $h2oTemp1[18];?>, <?php echo $humidity[18];?>],
['<?php echo $dtg[19];?>', <?php echo $temp[19];?>, <?php echo $h2oTemp1[19];?>, <?php echo $humidity[19];?>],
['<?php echo $dtg[20];?>', <?php echo $temp[20];?>, <?php echo $h2oTemp1[20];?>, <?php echo $humidity[20];?>],
['<?php echo $dtg[21];?>', <?php echo $temp[21];?>, <?php echo $h2oTemp1[21];?>, <?php echo $humidity[21];?>],
['<?php echo $dtg[22];?>', <?php echo $temp[22];?>, <?php echo $h2oTemp1[22];?>, <?php echo $humidity[22];?>],
['<?php echo $dtg[23];?>', <?php echo $temp[23];?>, <?php echo $h2oTemp1[23];?>, <?php echo $humidity[23];?>],
['<?php echo $dtg[24];?>', <?php echo $temp[24];?>, <?php echo $h2oTemp1[24];?>, <?php echo $humidity[24];?>],
['<?php echo $dtg[25];?>', <?php echo $temp[25];?>, <?php echo $h2oTemp1[25];?>, <?php echo $humidity[25];?>],
['<?php echo $dtg[26];?>', <?php echo $temp[26];?>, <?php echo $h2oTemp1[26];?>, <?php echo $humidity[26];?>],
['<?php echo $dtg[27];?>', <?php echo $temp[27];?>, <?php echo $h2oTemp1[27];?>, <?php echo $humidity[27];?>],
['<?php echo $dtg[28];?>', <?php echo $temp[28];?>, <?php echo $h2oTemp1[28];?>, <?php echo $humidity[28];?>],
['<?php echo $dtg[29];?>', <?php echo $temp[29];?>, <?php echo $h2oTemp1[29];?>, <?php echo $humidity[29];?>],
['<?php echo $dtg[30];?>', <?php echo $temp[30];?>, <?php echo $h2oTemp1[30];?>, <?php echo $humidity[30];?>],
['<?php echo $dtg[31];?>', <?php echo $temp[31];?>, <?php echo $h2oTemp1[31];?>, <?php echo $humidity[31];?>],
['<?php echo $dtg[32];?>', <?php echo $temp[32];?>, <?php echo $h2oTemp1[32];?>, <?php echo $humidity[32];?>],
['<?php echo $dtg[33];?>', <?php echo $temp[33];?>, <?php echo $h2oTemp1[33];?>, <?php echo $humidity[33];?>],
['<?php echo $dtg[34];?>', <?php echo $temp[34];?>, <?php echo $h2oTemp1[34];?>, <?php echo $humidity[34];?>],
['<?php echo $dtg[35];?>', <?php echo $temp[35];?>, <?php echo $h2oTemp1[35];?>, <?php echo $humidity[35];?>],
['<?php echo $dtg[36];?>', <?php echo $temp[36];?>, <?php echo $h2oTemp1[36];?>, <?php echo $humidity[36];?>],
['<?php echo $dtg[37];?>', <?php echo $temp[37];?>, <?php echo $h2oTemp1[37];?>, <?php echo $humidity[36];?>],
['<?php echo $dtg[38];?>', <?php echo $temp[38];?>, <?php echo $h2oTemp1[38];?>, <?php echo $humidity[37];?>],
['<?php echo $dtg[39];?>', <?php echo $temp[39];?>, <?php echo $h2oTemp1[39];?>, <?php echo $humidity[38];?>],
['<?php echo $dtg[40];?>', <?php echo $temp[40];?>, <?php echo $h2oTemp1[40];?>, <?php echo $humidity[39];?>],
['<?php echo $dtg[41];?>', <?php echo $temp[41];?>, <?php echo $h2oTemp1[41];?>, <?php echo $humidity[40];?>],
['<?php echo $dtg[42];?>', <?php echo $temp[42];?>, <?php echo $h2oTemp1[42];?>, <?php echo $humidity[41];?>],
['<?php echo $dtg[43];?>', <?php echo $temp[43];?>, <?php echo $h2oTemp1[43];?>, <?php echo $humidity[42];?>],
['<?php echo $dtg[44];?>', <?php echo $temp[44];?>, <?php echo $h2oTemp1[44];?>, <?php echo $humidity[43];?>],
['<?php echo $dtg[45];?>', <?php echo $temp[45];?>, <?php echo $h2oTemp1[45];?>, <?php echo $humidity[44];?>],
['<?php echo $dtg[46];?>', <?php echo $temp[46];?>, <?php echo $h2oTemp1[46];?>, <?php echo $humidity[45];?>],
['<?php echo $dtg[47];?>', <?php echo $temp[47];?>, <?php echo $h2oTemp1[47];?>, <?php echo $humidity[46];?>],
['<?php echo $dtg[48];?>', <?php echo $temp[48];?>, <?php echo $h2oTemp1[48];?>, <?php echo $humidity[47];?>],
['<?php echo $dtg[49];?>', <?php echo $temp[49];?>, <?php echo $h2oTemp1[49];?>, <?php echo $humidity[48];?>],
['<?php echo $dtg[50];?>', <?php echo $temp[50];?>, <?php echo $h2oTemp1[50];?>, <?php echo $humidity[49];?>],
['<?php echo $dtg[51];?>', <?php echo $temp[51];?>, <?php echo $h2oTemp1[51];?>, <?php echo $humidity[50];?>],
['<?php echo $dtg[52];?>', <?php echo $temp[52];?>, <?php echo $h2oTemp1[52];?>, <?php echo $humidity[51];?>],
['<?php echo $dtg[53];?>', <?php echo $temp[53];?>, <?php echo $h2oTemp1[53];?>, <?php echo $humidity[52];?>],
['<?php echo $dtg[54];?>', <?php echo $temp[54];?>, <?php echo $h2oTemp1[54];?>, <?php echo $humidity[53];?>],
['<?php echo $dtg[55];?>', <?php echo $temp[55];?>, <?php echo $h2oTemp1[55];?>, <?php echo $humidity[54];?>],
['<?php echo $dtg[56];?>', <?php echo $temp[56];?>, <?php echo $h2oTemp1[56];?>, <?php echo $humidity[55];?>],
['<?php echo $dtg[57];?>', <?php echo $temp[57];?>, <?php echo $h2oTemp1[57];?>, <?php echo $humidity[56];?>],
['<?php echo $dtg[58];?>', <?php echo $temp[58];?>, <?php echo $h2oTemp1[58];?>, <?php echo $humidity[57];?>],
['<?php echo $dtg[59];?>', <?php echo $temp[59];?>, <?php echo $h2oTemp1[59];?>, <?php echo $humidity[58];?>],
['<?php echo $dtg[60];?>', <?php echo $temp[60];?>, <?php echo $h2oTemp1[60];?>, <?php echo $humidity[59];?>],
['<?php echo $dtg[61];?>', <?php echo $temp[61];?>, <?php echo $h2oTemp1[61];?>, <?php echo $humidity[60];?>],
['<?php echo $dtg[62];?>', <?php echo $temp[62];?>, <?php echo $h2oTemp1[62];?>, <?php echo $humidity[61];?>],
['<?php echo $dtg[63];?>', <?php echo $temp[63];?>, <?php echo $h2oTemp1[63];?>, <?php echo $humidity[62];?>],
['<?php echo $dtg[64];?>', <?php echo $temp[64];?>, <?php echo $h2oTemp1[64];?>, <?php echo $humidity[63];?>],
['<?php echo $dtg[65];?>', <?php echo $temp[65];?>, <?php echo $h2oTemp1[65];?>, <?php echo $humidity[64];?>],
['<?php echo $dtg[66];?>', <?php echo $temp[66];?>, <?php echo $h2oTemp1[66];?>, <?php echo $humidity[65];?>],
['<?php echo $dtg[67];?>', <?php echo $temp[67];?>, <?php echo $h2oTemp1[67];?>, <?php echo $humidity[66];?>],
['<?php echo $dtg[68];?>', <?php echo $temp[68];?>, <?php echo $h2oTemp1[68];?>, <?php echo $humidity[67];?>],
['<?php echo $dtg[69];?>', <?php echo $temp[69];?>, <?php echo $h2oTemp1[69];?>, <?php echo $humidity[68];?>],
['<?php echo $dtg[70];?>', <?php echo $temp[70];?>, <?php echo $h2oTemp1[70];?>, <?php echo $humidity[69];?>],
['<?php echo $dtg[71];?>', <?php echo $temp[71];?>, <?php echo $h2oTemp1[71];?>, <?php echo $humidity[70];?>],
['<?php echo $dtg[72];?>', <?php echo $temp[72];?>, <?php echo $h2oTemp1[72];?>, <?php echo $humidity[71];?>],
['<?php echo $dtg[73];?>', <?php echo $temp[73];?>, <?php echo $h2oTemp1[73];?>, <?php echo $humidity[72];?>],
['<?php echo $dtg[74];?>', <?php echo $temp[74];?>, <?php echo $h2oTemp1[74];?>, <?php echo $humidity[73];?>],
['<?php echo $dtg[75];?>', <?php echo $temp[75];?>, <?php echo $h2oTemp1[75];?>, <?php echo $humidity[74];?>],
['<?php echo $dtg[76];?>', <?php echo $temp[76];?>, <?php echo $h2oTemp1[76];?>, <?php echo $humidity[75];?>],
['<?php echo $dtg[77];?>', <?php echo $temp[77];?>, <?php echo $h2oTemp1[77];?>, <?php echo $humidity[76];?>],
['<?php echo $dtg[78];?>', <?php echo $temp[78];?>, <?php echo $h2oTemp1[78];?>, <?php echo $humidity[77];?>],
['<?php echo $dtg[79];?>', <?php echo $temp[79];?>, <?php echo $h2oTemp1[79];?>, <?php echo $humidity[78];?>],
['<?php echo $dtg[80];?>', <?php echo $temp[80];?>, <?php echo $h2oTemp1[80];?>, <?php echo $humidity[79];?>],
['<?php echo $dtg[81];?>', <?php echo $temp[81];?>, <?php echo $h2oTemp1[81];?>, <?php echo $humidity[80];?>],
['<?php echo $dtg[82];?>', <?php echo $temp[82];?>, <?php echo $h2oTemp1[82];?>, <?php echo $humidity[81];?>],
['<?php echo $dtg[83];?>', <?php echo $temp[83];?>, <?php echo $h2oTemp1[83];?>, <?php echo $humidity[82];?>],
['<?php echo $dtg[84];?>', <?php echo $temp[84];?>, <?php echo $h2oTemp1[84];?>, <?php echo $humidity[83];?>],
['<?php echo $dtg[85];?>', <?php echo $temp[85];?>, <?php echo $h2oTemp1[85];?>, <?php echo $humidity[84];?>],
['<?php echo $dtg[86];?>', <?php echo $temp[86];?>, <?php echo $h2oTemp1[86];?>, <?php echo $humidity[85];?>],
['<?php echo $dtg[87];?>', <?php echo $temp[87];?>, <?php echo $h2oTemp1[87];?>, <?php echo $humidity[86];?>],
['<?php echo $dtg[88];?>', <?php echo $temp[88];?>, <?php echo $h2oTemp1[88];?>, <?php echo $humidity[87];?>],
['<?php echo $dtg[89];?>', <?php echo $temp[89];?>, <?php echo $h2oTemp1[89];?>, <?php echo $humidity[89];?>],
['<?php echo $dtg[90];?>', <?php echo $temp[90];?>, <?php echo $h2oTemp1[90];?>, <?php echo $humidity[90];?>],
['<?php echo $dtg[91];?>', <?php echo $temp[91];?>, <?php echo $h2oTemp1[91];?>, <?php echo $humidity[91];?>],
['<?php echo $dtg[92];?>', <?php echo $temp[92];?>, <?php echo $h2oTemp1[92];?>, <?php echo $humidity[92];?>],
['<?php echo $dtg[93];?>', <?php echo $temp[93];?>, <?php echo $h2oTemp1[93];?>, <?php echo $humidity[93];?>],
['<?php echo $dtg[94];?>', <?php echo $temp[94];?>, <?php echo $h2oTemp1[94];?>, <?php echo $humidity[94];?>],
['<?php echo $dtg[95];?>', <?php echo $temp[95];?>, <?php echo $h2oTemp1[95];?>, <?php echo $humidity[95];?>],
['<?php echo $dtg[96];?>', <?php echo $temp[96];?>, <?php echo $h2oTemp1[96];?>, <?php echo $humidity[96];?>],
['<?php echo $dtg[97];?>', <?php echo $temp[97];?>, <?php echo $h2oTemp1[97];?>, <?php echo $humidity[97];?>],
['<?php echo $dtg[98];?>', <?php echo $temp[98];?>, <?php echo $h2oTemp1[98];?>, <?php echo $humidity[98];?>],
['<?php echo $dtg[99];?>', <?php echo $temp[99];?>, <?php echo $h2oTemp1[99];?>, <?php echo $humidity[99];?>]



      ]);

var options1 = {
        hAxis: {
          title: 'Hourly Temp Reading',
          logScale: false,
          slantedText: true,
          minTextSpacing: 10
        },
        vAxis: {
          title: 'Farenheit (F)',
          logScale: false
        },
 series: {
         0:{color: 'red'},
         1:{color: 'black'},
         2:{color: 'green'}
        },
	title: 'Left Side',
	titleLocation: 'in',
        height: 400,
        colors: ['#a52714', '#097138']
     };

      var chart1 = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart1.draw(data1, options1);
    }
</script>
<!--
google.charts.setOnLoadCallback(drawLogScales2);




function drawLogScales2() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Date');
      data.addColumn('number', 'Air Temperature 2');
      data.addColumn('number', 'H20 Temperature 2');
      data.addColumn('number', 'Humidity 2');

      data.addRows([
['<?php echo $dtg[0];?>', <?php echo $temp2[0];?>, <?php echo $h2oTemp2[0];?>, <?php echo $humidity2[0];?>],
['<?php echo $dtg[1];?>', <?php echo $temp2[1];?>, <?php echo $h2oTemp2[1];?>, <?php echo $humidity2[1];?>],
['<?php echo $dtg[2];?>', <?php echo $temp2[2];?>, <?php echo $h2oTemp2[2];?>, <?php echo $humidity2[2];?>],
['<?php echo $dtg[3];?>', <?php echo $temp2[3];?>, <?php echo $h2oTemp2[3];?>, <?php echo $humidity2[3];?>],
['<?php echo $dtg[4];?>', <?php echo $temp2[4];?>, <?php echo $h2oTemp2[4];?>, <?php echo $humidity2[4];?>],
['<?php echo $dtg[5];?>', <?php echo $temp2[5];?>, <?php echo $h2oTemp2[5];?>, <?php echo $humidity2[5];?>],
['<?php echo $dtg[6];?>', <?php echo $temp2[6];?>, <?php echo $h2oTemp2[6];?>, <?php echo $humidity2[6];?>],
['<?php echo $dtg[7];?>', <?php echo $temp2[7];?>, <?php echo $h2oTemp2[7];?>, <?php echo $humidity2[7];?>],
['<?php echo $dtg[8];?>', <?php echo $temp2[8];?>, <?php echo $h2oTemp2[8];?>, <?php echo $humidity2[8];?>],
['<?php echo $dtg[9];?>', <?php echo $temp2[9];?>, <?php echo $h2oTemp2[9];?>, <?php echo $humidity2[9];?>],
['<?php echo $dtg[10];?>', <?php echo $temp2[10];?>, <?php echo $h2oTemp2[10];?>, <?php echo $humidity2[10];?>],
['<?php echo $dtg[11];?>', <?php echo $temp2[11];?>, <?php echo $h2oTemp2[11];?>, <?php echo $humidity2[11];?>],
['<?php echo $dtg[12];?>', <?php echo $temp2[12];?>, <?php echo $h2oTemp2[12];?>, <?php echo $humidity2[12];?>],
['<?php echo $dtg[13];?>', <?php echo $temp2[13];?>, <?php echo $h2oTemp2[13];?>, <?php echo $humidity2[13];?>],
['<?php echo $dtg[14];?>', <?php echo $temp2[14];?>, <?php echo $h2oTemp2[14];?>, <?php echo $humidity2[14];?>],
['<?php echo $dtg[15];?>', <?php echo $temp2[15];?>, <?php echo $h2oTemp2[15];?>, <?php echo $humidity2[15];?>],
['<?php echo $dtg[16];?>', <?php echo $temp2[16];?>, <?php echo $h2oTemp2[16];?>, <?php echo $humidity2[16];?>],
['<?php echo $dtg[17];?>', <?php echo $temp2[17];?>, <?php echo $h2oTemp2[17];?>, <?php echo $humidity2[17];?>],
['<?php echo $dtg[18];?>', <?php echo $temp2[18];?>, <?php echo $h2oTemp2[18];?>, <?php echo $humidity2[18];?>],
['<?php echo $dtg[19];?>', <?php echo $temp2[19];?>, <?php echo $h2oTemp2[19];?>, <?php echo $humidity2[19];?>],
['<?php echo $dtg[20];?>', <?php echo $temp2[20];?>, <?php echo $h2oTemp2[20];?>, <?php echo $humidity2[20];?>],
['<?php echo $dtg[21];?>', <?php echo $temp2[21];?>, <?php echo $h2oTemp2[21];?>, <?php echo $humidity2[21];?>],
['<?php echo $dtg[22];?>', <?php echo $temp2[22];?>, <?php echo $h2oTemp2[22];?>, <?php echo $humidity2[22];?>],
['<?php echo $dtg[23];?>', <?php echo $temp2[23];?>, <?php echo $h2oTemp2[23];?>, <?php echo $humidity2[23];?>],
['<?php echo $dtg[24];?>', <?php echo $temp2[24];?>, <?php echo $h2oTemp2[24];?>, <?php echo $humidity2[24];?>],
['<?php echo $dtg[25];?>', <?php echo $temp2[25];?>, <?php echo $h2oTemp2[25];?>, <?php echo $humidity2[25];?>],
['<?php echo $dtg[26];?>', <?php echo $temp2[26];?>, <?php echo $h2oTemp2[26];?>, <?php echo $humidity2[26];?>],
['<?php echo $dtg[27];?>', <?php echo $temp2[27];?>, <?php echo $h2oTemp2[27];?>, <?php echo $humidity2[27];?>],
['<?php echo $dtg[28];?>', <?php echo $temp2[28];?>, <?php echo $h2oTemp2[28];?>, <?php echo $humidity2[28];?>],
['<?php echo $dtg[29];?>', <?php echo $temp2[29];?>, <?php echo $h2oTemp2[29];?>, <?php echo $humidity2[29];?>],
['<?php echo $dtg[30];?>', <?php echo $temp2[30];?>, <?php echo $h2oTemp2[30];?>, <?php echo $humidity2[30];?>],
['<?php echo $dtg[31];?>', <?php echo $temp2[31];?>, <?php echo $h2oTemp2[31];?>, <?php echo $humidity2[31];?>],
['<?php echo $dtg[32];?>', <?php echo $temp2[32];?>, <?php echo $h2oTemp2[32];?>, <?php echo $humidity2[32];?>],
['<?php echo $dtg[33];?>', <?php echo $temp2[33];?>, <?php echo $h2oTemp2[33];?>, <?php echo $humidity2[33];?>],
['<?php echo $dtg[34];?>', <?php echo $temp2[34];?>, <?php echo $h2oTemp2[34];?>, <?php echo $humidity2[34];?>],
['<?php echo $dtg[35];?>', <?php echo $temp2[35];?>, <?php echo $h2oTemp2[35];?>, <?php echo $humidity2[35];?>],
['<?php echo $dtg[36];?>', <?php echo $temp2[36];?>, <?php echo $h2oTemp2[36];?>, <?php echo $humidity2[36];?>],
['<?php echo $dtg[37];?>', <?php echo $temp2[37];?>, <?php echo $h2oTemp2[37];?>, <?php echo $humidity2[36];?>],
['<?php echo $dtg[38];?>', <?php echo $temp2[38];?>, <?php echo $h2oTemp2[38];?>, <?php echo $humidity2[37];?>],
['<?php echo $dtg[39];?>', <?php echo $temp2[39];?>, <?php echo $h2oTemp2[39];?>, <?php echo $humidity2[38];?>],
['<?php echo $dtg[40];?>', <?php echo $temp2[40];?>, <?php echo $h2oTemp2[40];?>, <?php echo $humidity2[39];?>],
['<?php echo $dtg[41];?>', <?php echo $temp2[41];?>, <?php echo $h2oTemp2[41];?>, <?php echo $humidity2[40];?>],
['<?php echo $dtg[42];?>', <?php echo $temp2[42];?>, <?php echo $h2oTemp2[42];?>, <?php echo $humidity2[41];?>],
['<?php echo $dtg[43];?>', <?php echo $temp2[43];?>, <?php echo $h2oTemp2[43];?>, <?php echo $humidity2[42];?>],
['<?php echo $dtg[44];?>', <?php echo $temp2[44];?>, <?php echo $h2oTemp2[44];?>, <?php echo $humidity2[43];?>],
['<?php echo $dtg[45];?>', <?php echo $temp2[45];?>, <?php echo $h2oTemp2[45];?>, <?php echo $humidity2[44];?>],
['<?php echo $dtg[46];?>', <?php echo $temp2[46];?>, <?php echo $h2oTemp2[46];?>, <?php echo $humidity2[45];?>],
['<?php echo $dtg[47];?>', <?php echo $temp2[47];?>, <?php echo $h2oTemp2[47];?>, <?php echo $humidity2[46];?>],
['<?php echo $dtg[48];?>', <?php echo $temp2[48];?>, <?php echo $h2oTemp2[48];?>, <?php echo $humidity2[47];?>],
['<?php echo $dtg[49];?>', <?php echo $temp2[49];?>, <?php echo $h2oTemp2[49];?>, <?php echo $humidity2[48];?>],
['<?php echo $dtg[50];?>', <?php echo $temp2[50];?>, <?php echo $h2oTemp2[50];?>, <?php echo $humidity2[49];?>],
['<?php echo $dtg[51];?>', <?php echo $temp2[51];?>, <?php echo $h2oTemp2[51];?>, <?php echo $humidity2[50];?>],
['<?php echo $dtg[52];?>', <?php echo $temp2[52];?>, <?php echo $h2oTemp2[52];?>, <?php echo $humidity2[51];?>],
['<?php echo $dtg[53];?>', <?php echo $temp2[53];?>, <?php echo $h2oTemp2[53];?>, <?php echo $humidity2[52];?>],
['<?php echo $dtg[54];?>', <?php echo $temp2[54];?>, <?php echo $h2oTemp2[54];?>, <?php echo $humidity2[53];?>],
['<?php echo $dtg[55];?>', <?php echo $temp2[55];?>, <?php echo $h2oTemp2[55];?>, <?php echo $humidity2[54];?>],
['<?php echo $dtg[56];?>', <?php echo $temp2[56];?>, <?php echo $h2oTemp2[56];?>, <?php echo $humidity2[55];?>],
['<?php echo $dtg[57];?>', <?php echo $temp2[57];?>, <?php echo $h2oTemp2[57];?>, <?php echo $humidity2[56];?>],
['<?php echo $dtg[58];?>', <?php echo $temp2[58];?>, <?php echo $h2oTemp2[58];?>, <?php echo $humidity2[57];?>],
['<?php echo $dtg[59];?>', <?php echo $temp2[59];?>, <?php echo $h2oTemp2[59];?>, <?php echo $humidity2[58];?>],
['<?php echo $dtg[60];?>', <?php echo $temp2[60];?>, <?php echo $h2oTemp2[60];?>, <?php echo $humidity2[59];?>],
['<?php echo $dtg[61];?>', <?php echo $temp2[61];?>, <?php echo $h2oTemp2[61];?>, <?php echo $humidity2[60];?>],
['<?php echo $dtg[62];?>', <?php echo $temp2[62];?>, <?php echo $h2oTemp2[62];?>, <?php echo $humidity2[61];?>],
['<?php echo $dtg[63];?>', <?php echo $temp2[63];?>, <?php echo $h2oTemp2[63];?>, <?php echo $humidity2[62];?>],
['<?php echo $dtg[64];?>', <?php echo $temp2[64];?>, <?php echo $h2oTemp2[64];?>, <?php echo $humidity2[63];?>],
['<?php echo $dtg[65];?>', <?php echo $temp2[65];?>, <?php echo $h2oTemp2[65];?>, <?php echo $humidity2[64];?>],
['<?php echo $dtg[66];?>', <?php echo $temp2[66];?>, <?php echo $h2oTemp2[66];?>, <?php echo $humidity2[65];?>],
['<?php echo $dtg[67];?>', <?php echo $temp2[67];?>, <?php echo $h2oTemp2[67];?>, <?php echo $humidity2[66];?>],
['<?php echo $dtg[68];?>', <?php echo $temp2[68];?>, <?php echo $h2oTemp2[68];?>, <?php echo $humidity2[67];?>],
['<?php echo $dtg[69];?>', <?php echo $temp2[69];?>, <?php echo $h2oTemp2[69];?>, <?php echo $humidity2[68];?>],
['<?php echo $dtg[70];?>', <?php echo $temp2[70];?>, <?php echo $h2oTemp2[70];?>, <?php echo $humidity2[69];?>],
['<?php echo $dtg[71];?>', <?php echo $temp2[71];?>, <?php echo $h2oTemp2[71];?>, <?php echo $humidity2[70];?>],
['<?php echo $dtg[72];?>', <?php echo $temp2[72];?>, <?php echo $h2oTemp2[72];?>, <?php echo $humidity2[71];?>],
['<?php echo $dtg[73];?>', <?php echo $temp2[73];?>, <?php echo $h2oTemp2[73];?>, <?php echo $humidity2[72];?>],
['<?php echo $dtg[74];?>', <?php echo $temp2[74];?>, <?php echo $h2oTemp2[74];?>, <?php echo $humidity2[73];?>],
['<?php echo $dtg[75];?>', <?php echo $temp2[75];?>, <?php echo $h2oTemp2[75];?>, <?php echo $humidity2[74];?>],
['<?php echo $dtg[76];?>', <?php echo $temp2[76];?>, <?php echo $h2oTemp2[76];?>, <?php echo $humidity2[75];?>],
['<?php echo $dtg[77];?>', <?php echo $temp2[77];?>, <?php echo $h2oTemp2[77];?>, <?php echo $humidity2[76];?>],
['<?php echo $dtg[78];?>', <?php echo $temp2[78];?>, <?php echo $h2oTemp2[78];?>, <?php echo $humidity2[77];?>],
['<?php echo $dtg[79];?>', <?php echo $temp2[79];?>, <?php echo $h2oTemp2[79];?>, <?php echo $humidity2[78];?>],
['<?php echo $dtg[80];?>', <?php echo $temp2[80];?>, <?php echo $h2oTemp2[80];?>, <?php echo $humidity2[79];?>],
['<?php echo $dtg[81];?>', <?php echo $temp2[81];?>, <?php echo $h2oTemp2[81];?>, <?php echo $humidity2[80];?>],
['<?php echo $dtg[82];?>', <?php echo $temp2[82];?>, <?php echo $h2oTemp2[82];?>, <?php echo $humidity2[81];?>],
['<?php echo $dtg[83];?>', <?php echo $temp2[83];?>, <?php echo $h2oTemp2[83];?>, <?php echo $humidity2[82];?>],
['<?php echo $dtg[84];?>', <?php echo $temp2[84];?>, <?php echo $h2oTemp2[84];?>, <?php echo $humidity2[83];?>],
['<?php echo $dtg[85];?>', <?php echo $temp2[85];?>, <?php echo $h2oTemp2[85];?>, <?php echo $humidity2[84];?>],
['<?php echo $dtg[86];?>', <?php echo $temp2[86];?>, <?php echo $h2oTemp2[86];?>, <?php echo $humidity2[85];?>],
['<?php echo $dtg[87];?>', <?php echo $temp2[87];?>, <?php echo $h2oTemp2[87];?>, <?php echo $humidity2[86];?>],
['<?php echo $dtg[88];?>', <?php echo $temp2[88];?>, <?php echo $h2oTemp2[88];?>, <?php echo $humidity2[87];?>],
['<?php echo $dtg[89];?>', <?php echo $temp2[89];?>, <?php echo $h2oTemp2[89];?>, <?php echo $humidity2[89];?>],
['<?php echo $dtg[90];?>', <?php echo $temp2[90];?>, <?php echo $h2oTemp2[90];?>, <?php echo $humidity2[90];?>],
['<?php echo $dtg[91];?>', <?php echo $temp2[91];?>, <?php echo $h2oTemp2[91];?>, <?php echo $humidity2[91];?>],
['<?php echo $dtg[92];?>', <?php echo $temp2[92];?>, <?php echo $h2oTemp2[92];?>, <?php echo $humidity2[92];?>],
['<?php echo $dtg[93];?>', <?php echo $temp2[93];?>, <?php echo $h2oTemp2[93];?>, <?php echo $humidity2[93];?>],
['<?php echo $dtg[94];?>', <?php echo $temp2[94];?>, <?php echo $h2oTemp2[94];?>, <?php echo $humidity2[94];?>],
['<?php echo $dtg[95];?>', <?php echo $temp2[95];?>, <?php echo $h2oTemp2[95];?>, <?php echo $humidity2[95];?>],
['<?php echo $dtg[96];?>', <?php echo $temp2[96];?>, <?php echo $h2oTemp2[96];?>, <?php echo $humidity2[96];?>],
['<?php echo $dtg[97];?>', <?php echo $temp2[97];?>, <?php echo $h2oTemp2[97];?>, <?php echo $humidity2[97];?>],
['<?php echo $dtg[98];?>', <?php echo $temp2[98];?>, <?php echo $h2oTemp2[98];?>, <?php echo $humidity2[98];?>],
['<?php echo $dtg[99];?>', <?php echo $temp2[99];?>, <?php echo $h2oTemp2[99];?>, <?php echo $humidity2[99];?>]



      ]);

var options = {
        hAxis: {
          title: 'Hourly Temp Reading',
          logScale: false,
          slantedText: true,
          minTextSpacing: 10
        },
        vAxis: {
          title: 'Farenheit (F)',
          logScale: false
        },
 series: {
         0:{color: 'blue'},
         1:{color: 'purple'},
         2:{color: 'yellow'}
        },
	title: 'Right Side',
        height: 400,
        colors: ['#a52714', '#097138'],
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_divR'));
      chart.draw(data, options);
}
-->



  </head>
  <body>

   <div id="chart_div">
	
   </div>

   <div id="chart_divR">

   </div>
  </body>
</html>
