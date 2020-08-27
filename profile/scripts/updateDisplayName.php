<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$currentDisplayName = $getCurrentUserRow['displayName'];
$newDisplayName = $_POST['newDisplayName'];

$updateSQL = " UPDATE accounts SET displayName = '".$newDisplayName."' WHERE id = '".$_SESSION['id']."' ";

if(mysqli_query($con, $updateSQL)) {
    echo("<script>location.href = '/profile/settings.php';</script>");
}


?>