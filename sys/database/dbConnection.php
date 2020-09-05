<!-- DOWNSOUTHRP.COM -->
<!-- CREATED BY THE DOWNSOUTHRP DEVELOPMENT DIVISION -->

<?php

$DATABASE_HOST = '192.3.157.104';
$DATABASE_USER = 'DSRPWebConnection';
$DATABASE_PASS = 'DSRPAdmin2020!';
$DATABASE_NAME = 'downsouthrp_main';

// MAKES CONNECTION TO DATABASE
$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
