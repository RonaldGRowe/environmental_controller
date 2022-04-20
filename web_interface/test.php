<?php

$result = shell_exec('python3 /home/ronaldgrowe/mysite/environmental_controller/web_controller/graphlogin.py');
if($result){
echo "2";}
$reading = json_decode($result, true);

echo $reading;
/*echo $result;*/
echo "3";
?>
