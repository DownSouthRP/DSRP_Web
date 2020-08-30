<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include($_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_POST)) {
    echo "-";
    exit;
}

// FORM FIELDS
$name = $_POST['appName'];
$dob = $_POST['appDoB'];
$age = $_POST['appAge'];
$email = $_POST['appEmail'];
$appDept = $_POST['appDept'];
$appQ1 = $_POST['appQ1'];
$appQ2 = $_POST['appQ2'];
$appQ3 = $_POST['appQ3'];
$appQ4 = $_POST['appQ4'];
$appQ5 = $_POST['appQ5'];
$appUser = $_SESSION['id'];
$appAgree = $_POST['appAgree'];
$appStatus = 'Application Submitted - Pending Review';
$appDateTime = date('Y-m-d') . " @ " . date('H:i:s');
$appMonth = date('m');
$appSQL = " INSERT INTO apps (name, dob, age, email, appDept, appQ1, appQ2, appQ3, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth) 
VALUES ('$name', '$dob', '$age', '$email', '$appDept', '$appQ1', '$appQ2', '$appQ3', '$appQ4', '$appQ5', $appUser,'$appAgree', '$appStatus', '$appDateTime', '$appMonth')";

// SYSTEM LOG
$systemLogTimeDate = date('H:i:s');
$systemLogDate = date('Y-m-d');
$systemLogName = "Application Submitted";
$systemLogType = "appSubmittion";
$systemLogDetails = $getCurrentUserRow['displayName'] . " sent in an application";
$logSQL = " INSERT INTO systemLogs (systemLogTime, systemLogDate, systemLogName, systemLogType, systemLogDetails) VALUES ('$systemLogTimeDate', '$systemLogDate', '$systemLogName', '$systemLogType', '$systemLogDetails') ";





if(mysqli_query($con, $appSQL)) {
    if(mysqli_query($con, $logSQL)) {
        
        $getLatestApp = " SELECT * FROM apps ORDER BY ID DESC LIMIT 1";
        $getLatestAppsResult = mysqli_query($con, $getLatestApp);
        $getLatestAppRow = mysqli_fetch_assoc($getLatestAppsResult);

        $app = $getLatestAppRow['id'];
        $detail = "Application Created & Submitted";

        $appActivitySQL = " INSERT INTO appActivity (app, detail, dateTime) VALUES ('$app', '$detail', '$appDateTime') ";
        if(mysqli_query($con, $appActivitySQL)) {
            echo("<script>location.href = '/apps/';</script>");
        } else {
            echo 'an error has occured - level 3';
        }
    } else {
        echo 'an error has occured - level 2';
    }
} else {
    echo 'an error has occured - level 1';
}


?>