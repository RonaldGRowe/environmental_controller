<?php

$data = array("your in");

$result = shell_exec('python "/mysite/environmental_controller/web_controller/web_live_cond.py" ' . escapeshellarg(json_encode($data)));

$reading = json_decode($result, true);

echo $reading;
echo $result;
?>
