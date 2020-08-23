<!-- DOWNSOUTHRP.COM -->
<!-- CREATED BY THE DOWNSOUTHRP DEVELOPMENT DIVISION -->

<?php

// DATABASE VARIABLES
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'downsouthrp_main';

// MAKES CONNECTION TO DATABASE
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// LOGS ERROR
if ( mysqli_connect_errno() ) {
    exit('Failed to connect to DataBase: ' . mysqli_connect_error());
}

?>
