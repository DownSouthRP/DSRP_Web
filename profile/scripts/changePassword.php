<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// $oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$systemLogTimeDate = date('H:i:s');
$systemLogDate = date('Y-m-d');
$systemLogName = "Account Password Changed";
$systemLogType = "settingUpdate";
$systemLogDetails = $getCurrentUserRow['displayName'] . " has changed their account password.";
$logSQL = " INSERT INTO systemLogs (systemLogTime, systemLogDate, systemLogName, systemLogType, systemLogDetails) VALUES ('$systemLogTimeDate', '$systemLogDate', '$systemLogName', '$systemLogType', '$systemLogDetails') ";

$updateSQL = " UPDATE accounts SET password = '".$hashedPassword."' WHERE id = '".$_SESSION['id']."' ";

if($confirmNewPassword !== $newPassword) {
    echo "passes dont match";
} else {

    if(mysqli_query($con, $updateSQL)) {
        if(mysqli_query($con, $logSQL)) {
            echo("<script>location.href = '/profile/settings.php';</script>");
        }
    }

}


?>