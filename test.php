<?php

$a = $_SERVER['REMOTE_ADDR'];
$b = $_SERVER['SERVER_NAME'];

echo $a;
echo '<br>';
echo $b;


if($b == 'localhost') {
    echo '<br><br>-<br>This is a local server.';
}


?>