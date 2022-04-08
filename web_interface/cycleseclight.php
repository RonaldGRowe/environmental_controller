<?php
session_start();
if($_SESSION["logged"] != true){
header("location: loginpage.html");
exit();
}
?>
<?php

$data = array("your in");
$result = shell_exec('python "/website/mysite/sensors/web_cycle_sec_light.py" ' . escapeshellarg(json_encode($data)));
$resultData = json_decode($result, true);

if($resultData == "done"){
header("location: index.php");
}
?>

