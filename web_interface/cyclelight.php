<?php
/*
session_start();
if($_SESSION["logged"] != true){
header("location: loginpage.html");
exit();
}
*/
?>

<?php

$result = shell_exec('python3 /home/ronaldgrowe/mysite/environmental_controller/web_controller/web_cycle_light.py');
$resultData = json_decode($result, true);

if($resultData == "done"){
header("location: index.php");
}
?>

