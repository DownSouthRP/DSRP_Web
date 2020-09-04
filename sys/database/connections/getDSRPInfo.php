<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$getDSRPInfoSQL = " SELECT * FROM dsrpInfo WHERE id = '1' ";
$getDSRPInfoResult = mysqli_query($con, $getDSRPInfoSQL);
$getDSRPInfoRow = mysqli_fetch_assoc($getDSRPInfoResult);

// $getDSRPInfoRow[''];
?>