<!-- CREATED BY THE DOWNSOUTHRP DEVELOPMENT DEPARTMENT -->
<!-- THIS FILE CONTAINS DATABSE SELECTs FOR CURRENT USER RELATED APPLICATIONS -->

<?php
// CONNECTS TO THE DSRP MAIN DATABASE
require_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbconnection.php";

// STARTS SESSION IF NOT ALREADY STARTED
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// SETS VARIABLES
$currentMonth = date('m');
$currentUser = $_SESSION['id'];
$appAccepted = 'Application Accepted';
$appDenied = 'Application Denied';
$appPending = 'Application Submitted - Pending Review';
$appPendingLead = 'Application Submitted - Pending Lead Review';

// GET COUNTS
// GET ALL APPS FROM USER
$getAllAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$currentUser."' ";
$getAllCountResult = mysqli_query($con, $getAllAppCount);
$getAllCountArray = mysqli_fetch_array($getAllCountResult);

// GET ALL APPS FROM USER THIS CYCLE
$getAllAppCycleCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$currentUser."' AND appMonth = '".$currentMonth."' ";
$getAllCycleCountResult = mysqli_query($con, $getAllAppCycleCount);
$getAllCycleCountArray = mysqli_fetch_array($getAllCycleCountResult);

// GET ALL PENDING APPS FROM USER
$getPendingAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$currentUser."' AND appStatus = '".$appPending."' OR appStatus = '".$appPendingLead."' ";
$getPendingCountResult = mysqli_query($con, $getPendingAppCount);

// GET ALL ACCEPTED APPS FROM USER
$getAcceptedAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$currentUser."' AND appStatus = ".$appAccepted."' ";
$getAcceptedCountResult = mysqli_query($con, $getAcceptedAppCount);

// GET ALL DENIED APPS FROM USER
$getDeniedAppCount = " SELECT COUNT(*) FROM apps WHERE appUser = '".$currentUser."' AND appStatus = '".$appDenied."' ";
$getDeniedCountResult = mysqli_query($con, $getDeniedAppCount);

// GET ARRAY
// GET ALL APPS FROM USER
$getAllAppArray = " SELECT * FROM apps WHERE appUser = '".$currentUser."' ";
$getAllResult = mysqli_query($con, $getAllAppArray);

// GET ALL PENDING APPS FROM USER
$getPendingAppArray = " SELECT * FROM apps WHERE appUser = '".$currentUser."' AND appStatus = '".$appPending."' ";
$getPendingResult = mysqli_query($con, $getPendingAppArray);

// GET ALL ACCEPTED APPS FROM USER
$getAcceptedAppArray = " SELECT * FROM apps WHERE appUser = '".$currentUser."' AND appStatus = '".$appAccepted."' ";
$getAcceptedResult = mysqli_query($con, $getAcceptedAppArray);

// GET ALL DENIED APPS FROM USER
$getDeniedAppArray = " SELECT * FROM apps WHERE appUser = '".$currentUser."' AND appStatus = '".$appDenied."' ";
$getDeniedResult = mysqli_query($con, $getDeniedAppArray);

?>