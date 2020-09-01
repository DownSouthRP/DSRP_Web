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

$dateTime = date('Y-m-d') . " @ " . date('H:i:s');

// GET LAST APP SUBMITTED
$getLatestApp = " SELECT * FROM apps ORDER BY ID DESC LIMIT 1";
$getLatestAppsResult = mysqli_query($con, $getLatestApp);
$getLatestAppRow = mysqli_fetch_assoc($getLatestAppsResult);

$thisApp = $getLatestAppRow['id'] + 1;

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
$appMonth = date('m');
$appYear = date('y');
$appSQL = " INSERT INTO apps (id, name, dob, age, email, appDept, appQ1, appQ2, appQ3, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth, appYear) 
VALUES ('$thisApp', '$name', '$dob', '$age', '$email', '$appDept', '$appQ1', '$appQ2', '$appQ3', '$appQ4', '$appQ5', $appUser, '$appAgree', '$appStatus', '$dateTime', '$appMonth', '$appYear')";

// SYSTEM LOG
$systemLogName = "Application Submitted";
$systemLogType = "appSubmittion";
$systemLogDetails = $getCurrentUserRow['displayName'] . " sent in an application" . '<a href="/apps/view.php?id=' . $thisApp . '">[VIEW]</a>';
$logSQL = " INSERT INTO systemLogs (systemLogDateTime, systemLogName, systemLogType, systemLogDetails) 
VALUES ('$dateTime;', '$systemLogName', '$systemLogType', '$systemLogDetails') ";

// ACTIVITY LOG
$account = $_SESSION['id'];
$activityDetail = 'Application Submitted' . '<a href="/apps/view.php?id=' . $thisApp . '">[VIEW]</a>';
$accountActivitySQL = " INSERT INTO accoutnActivity (account, activityDetails, activityDateTime)
VALUES ('$account', 'activityDetail', '$dateTime') ";

// APPLICATION ACTIVITY LOG
$detail = "Application Created & Submitted";
$appActivitySQL = " INSERT INTO appActivity (app, detail, dateTime) 
VALUES ('$thisApp', '$detail', '$dateTime') ";


// SUBMITS THE APPLICATION
if(mysqli_query($con, $appSQL)) {
    // SUBMITS THE SYSTEM LOG
    if(mysqli_query($con, $logSQL)) {
        // SUBMITS THE APP ACTIVITY LOG
        if(mysqli_query($con, $appActivitySQL)) {
            // SUBMITS ACCOUNT ACTIVITY LOG
            if(mysqli_query($con, $appSQL)) {
                // IF ALL IS GOOD - SENDS USER TO THEIR APPLICATION PAGE
                echo('<script>location.href = "/apps/view?id="' . $thisApp . '</script>');
            } else {
                // ACCOUNT ACTIVITY LOG ERROR
                echo 'an error has occured - level 4';
            }
        } else {
            // ACTIVITY LOG ERROR
            echo 'an error has occured - level 3';
        }
    } else {
        // SYSTEM LOG ERROR
        echo 'an error has occured - level 2';
    }
} else {
    // APPLICATION ERROR
    echo 'an error has occured - level 1';
}


?>