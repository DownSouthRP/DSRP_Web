<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

$getAllUsersSQL = " SELECT COUNT(*) FROM accounts ";
$getAllUsersResult = mysqli_query($con, $getAllUsersSQL);
$getAllUsersCount = mysqli_fetch_array($getAllUsersResult);

$allUsersSQL = " SELECT * FROM accounts ";
$allUsersResult = mysqli_query($con, $allUsersSQL);

// $getCurrentUserRow[''];
?>