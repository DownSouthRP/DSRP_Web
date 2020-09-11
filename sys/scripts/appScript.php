<?php

// IMPORTS DATABASE CONNECTION - $con 
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
// IMPORTS CURRENT USER CONNECTION $getCurrentUser[''];
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";


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

// VALIDATE INPUTS
$name = '';
$dob = '';
$age = '';
$email = '';
$appDept = '';
$appQ1 = '';
$appQ2 = '';
$appQ3 = '';
$appQ4 = '';
$appQ5 = '';
$appAgree = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = validate($_POST['appName']);
    $dob = validate($_POST['appDoB']);
    $age = validate($_POST['appAge']);
    $email = validate($_POST['appEmail']);
    $appDept = validate($_POST['appDept']);
    $appQ1 = validate($_POST['appQ1']);
    $appQ2 = validate($_POST['appQ2']);
    $appQ3 = validate($_POST['appQ3']);
    $appQ4 = validate($_POST['appQ4']);
    $appQ5 = validate($_POST['appQ5']);
    $appAgree = validate($_POST['appAgree']);
  }
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
$appMonth = date('m');
$appYear = date('y');
$appSQL = " INSERT INTO apps (id, name, dob, age, email, appDept, appQ1, appQ2, appQ3, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth, appYear) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

// SYSTEM LOG
$systemLogName = "Application Submitted";
$systemLogType = "appSubmittion";
$systemLogDetails = $getCurrentUserRow['displayName'] . " sent in an application" . '<a href="/apps/view.php?id=' . $thisApp . '">[VIEW]</a>';
$logSQL = " INSERT INTO systemLogs (systemLogDateTime, systemLogName, systemLogType, systemLogDetails) 
VALUES (?,?,?,?) ";

// ACTIVITY LOG
$account = $_SESSION['id'];
$activityDetail = 'Application Submitted' . '<a href="/apps/view.php?id=' . $thisApp . '">[VIEW]</a>';
$accountActivitySQL = " INSERT INTO accoutnActivity (account, activityDetails, activityDateTime)
VALUES (?,?,?) ";

// APPLICATION ACTIVITY LOG
$detail = "Application Created & Submitted";
$appActivitySQL = " INSERT INTO appActivity (app, detail, dateTime) 
VALUES (?,?,?) ";


// SQL STATEMENTS
$appStmt = $con->prepare($appSQL);
$appStmt->bind_param("sssssssssssssssss", $thisApp, $name, $dob, $age, $email, $appDept, $appQ1, $appQ2, $appQ3, $appQ4, $appQ5, $appUser, $appAgree, $appStatus, $dateTime, $appMonth, $appYear);

$sysLogStmt = $con->prepare($logSQL);
$sysLogStmt->bind_param("ssss", $dateTime, $systemLogName, $systemLogType, $systemLogDetails);

$accActStmt = $con->prepare($accountActivitySQL);
$accActStmt->bind_param("sss", $account, $activityDetail, $dateTime);

$appActStmt = $con->prepare($appActivitySQL);
$appActStmt->bind_param("sss", $thisApp, $detail, $dateTime);

// SUBMIT THE APP AND LOGS
$appStmt->execute();
$sysLogStmt->execute();
$accActStmt->execute();
$appActStmt->execute();

echo('<script>location.href = "/apps/view?id="' . $thisApp . '</script>');

$stmt->close();
$con->close();
?>