<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/dbconnection.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$getUserSQL = " SELECT * FROM accounts WHERE id = '".$_SESSION['id']."' ";
$getUserResult = mysqli_query($con, $getUserSQL);
$getUserRow = mysqli_fetch_assoc($getUserResult);

// $getCurrentUserRow[''];
?>