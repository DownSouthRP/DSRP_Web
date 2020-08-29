<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$currentEmailAddress = $getCurrentUserRow['email'];
$newEmailAddress = $_POST['newEmailAddress'];

$systemLogTimeDate = date('H:i:s');
$systemLogDate = date('Y-m-d');
$systemLogName = "Email Address Changed";
$systemLogType = "settingUpdate";
$systemLogDetails = $getCurrentUserRow['displayName'] . " has updated their email address to " . $newEmailAddress;
$logSQL = " INSERT INTO systemLogs (systemLogTime, systemLogDate, systemLogName, systemLogType, systemLogDetails) VALUES ('$systemLogTimeDate', '$systemLogDate', '$systemLogName', '$systemLogType', '$systemLogDetails') ";

$updateSQL = " UPDATE accounts SET email = '".$newEmailAddress."' WHERE id = '".$_SESSION['id']."' ";

if (filter_var($_POST['newEmailAddress'], FILTER_VALIDATE_EMAIL)) {

    if(mysqli_query($con, $updateSQL)) {
        if(mysqli_query($con, $logSQL)) {
            echo("<script>location.href = '/profile/settings.php';</script>");
        }
    }

} else {
    echo("<script>location.href = '/profile/settings.php';</script>");
}





?>