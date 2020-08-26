<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/dbconnection.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$getCurrentUserSQL = " SELECT * FROM accounts WHERE id = '".$_SESSION['id']."' ";
$getCurrentUserResult = mysqli_query($con, $getCurrentUserSQL);
$getCurrentUserRow = mysqli_fetch_assoc($getCurrentUserResult);

// $getCurrentUserRow[''];
?>