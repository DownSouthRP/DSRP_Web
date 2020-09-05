<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php");

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$getAllUsersSQL = " SELECT COUNT(*) FROM accounts ";
$getAllUsersResult = mysqli_query($con, $getAllUsersSQL);
$getAllUsersCount = mysqli_fetch_array($getAllUsersResult);

$allUsersSQL = " SELECT * FROM accounts ";
$allUsersResult = mysqli_query($con, $allUsersSQL);

// $getCurrentUserRow[''];
?>