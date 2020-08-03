<?php

$data = array("your in");

$result = shell_exec('python "/website/mysite/sensors/tempread.py" ' . escapeshellarg(json_encode($data)));

$reading = json_decode($result, true);

echo $reading;
?>
