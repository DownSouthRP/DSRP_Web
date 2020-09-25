<?php

$server = $_SERVER['SERVER_NAME'];

if($server == 'localhost') {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'dsrpmain';
}
elseif($server == 'dsrp.online') {
    $DATABASE_HOST = '69.13.33.171';
    $DATABASE_USER = 'DSRPWebConnection';
    $DATABASE_PASS = 'DSRPAdmin2020!';
    $DATABASE_NAME = 'downsouthrp_main';
}
else {
    echo 'There has been an error. More than likely you are not suppose to be doing what you are doing.';
}

$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>