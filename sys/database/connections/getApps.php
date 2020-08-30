<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/database/dbconnection.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$currentMonth = date('m');

// GET COUNTS
// GET ALL APPS
$getAllAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$_SESSION['id']."' ";
$getAllCountResult = mysqli_query($con, $getAllAppCount);
$getAllCountArray = mysqli_fetch_array($getAllCountResult);

// GET ALL APPS THIS CYCLE
$getAllAppCycleCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$_SESSION['id']."' AND appMonth = '".$currentMonth."' ";
$getAllCycleCountResult = mysqli_query($con, $getAllAppCycleCount);
$getAllCycleCountArray = mysqli_fetch_array($getAllCycleCountResult);

// GET ALL PENDING APPS
$getPendingAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$_SESSION['id']."' AND appStatus = 'Application Submitted - Pending Review' ";
$getPendingCountResult = mysqli_query($con, $getPendingAppCount);

// GET ALL ACCEPTED APPS
$getAcceptedAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$_SESSION['id']."' AND appStatus = 'Application Accepted' ";
$getAcceptedCountResult = mysqli_query($con, $getAcceptedAppCount);

// GET ALL DENIED APPS
$getDeniedAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$_SESSION['id']."' AND appStatus = 'Application Denied' ";
$getDeniedCountResult = mysqli_query($con, $getDeniedAppCount);

// GET ARRAY
// GET ALL APPS
$getAllAppArray = " SELECT * FROM apps WHERE appUser = '".$_SESSION['id']."' ";
$getAllResult = mysqli_query($con, $getAllAppArray);

// GET ALL PENDING APPS
$getPendingAppArray = " SELECT * FROM apps WHERE appUser = '".$_SESSION['id']."' AND appStatus = 'Application Submitted - Pending Review' ";
$getPendingResult = mysqli_query($con, $getPendingAppArray);

// GET ALL ACCEPTED APPS
$getAcceptedAppArray = " SELECT * FROM apps WHERE appUser = '".$_SESSION['id']."' AND appStatus = 'Application Accepted' ";
$getAcceptedResult = mysqli_query($con, $getAcceptedAppArray);

// GET ALL DENIED APPS
$getDeniedAppArray = " SELECT * FROM apps WHERE appUser = '".$_SESSION['id']."' AND appStatus = 'Application Denied' ";
$getDeniedResult = mysqli_query($con, $getDeniedAppArray);




?>