<?php

$DATABASE_HOST = '69.13.33.171';
$DATABASE_USER = 'DSRPWebConnection';
$DATABASE_PASS = 'DSRPAdmin2020!';
$DATABASE_NAME = 'downsouthrp_main';

$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>