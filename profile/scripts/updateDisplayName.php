<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$systemLogTimeDate = date('H:i:s');
$systemLogDate = date('Y-m-d');
$systemLogName = "Display Name Changed";
$systemLogType = "settingUpdate";
$systemLogDetails = $getCurrentUserRow['displayName'] . " has changed their account password.";
$logSQL = " INSERT INTO systemLogs (systemLogTime, systemLogDate, systemLogName, systemLogType, systemLogDetails) VALUES ('$systemLogTimeDate', '$systemLogDate', '$systemLogName', '$systemLogType', '$systemLogDetails') ";

$currentDisplayName = $getCurrentUserRow['displayName'];
$newDisplayName = $_POST['newDisplayName'];

$updateSQL = " UPDATE accounts SET displayName = '".$newDisplayName."' WHERE id = '".$_SESSION['id']."' ";

if(mysqli_query($con, $updateSQL)) {
    if(mysqli_query($con, $logSQL)) {
        echo("<script>location.href = '/profile/settings.php';</script>");
    }
}


?>