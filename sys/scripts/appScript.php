<?php
session_start();
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
    $appUser = $_SESSION['id'];
    $appAgree = validate($_POST['appAgree']);
    $appDateTime = $dateTime;
    $appStatus = 'Application Submitted - Pending Review';
    $appMonth = date('m');
    $appYear = date('y');
  }
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



// // SYSTEM LOG
// $systemLogName = "Application Submitted";
// $systemLogType = "appSubmittion";
// $systemLogDetails = $getCurrentUserRow['displayName'] . " sent in an application" . '<a href="/apps/view.php?id=' . $thisApp . '">[VIEW]</a>';
// $logSQL = " INSERT INTO systemLogs (systemLogDateTime, systemLogName, systemLogType, systemLogDetails) 
// VALUES (?,?,?,?) ";

// // ACTIVITY LOG
// $account = $_SESSION['id'];
// $activityDetail = 'Application Submitted' . '<a href="/apps/view.php?id=' . $thisApp . '">[VIEW]</a>';
// $accountActivitySQL = " INSERT INTO accoutnActivity (account, activityDetails, activityDateTime)
// VALUES (?,?,?) ";

// // APPLICATION ACTIVITY LOG
// $detail = "Application Created & Submitted";
// $appActivitySQL = " INSERT INTO appActivity (app, detail, dateTime) 
// VALUES (?,?,?) ";

// , appQ1, appQ2, appQ3, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth, appYear
// , $appQ1, $appQ2, $appQ3, $appQ4, $appQ5, $appUser, $appAgree, $appStatus, $appDateTime, $appMonth, $appYear
// ,?,?,?,?,?,?,?,?,?,?

if($stmt = $con->prepare(' INSERT INTO apps (name, dob, age, email, appDept, appQ1, appQ2, appQ3, appQ4, appQ5, appUser, appAgree, appStatus, appDateTime, appMonth, appYear) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ')) {
    if($stmt->bind_param("ssssssssssssssss", $name, $dob, $age, $email, $appDept, $appQ1, $appQ2, $appQ3, $appQ4, $appQ5, $appUser, $appAgree, $appStatus, $appDateTime, $appMonth, $appYear)) {
        if($stmt->execute()) {
            echo('<script>location.href = "/apps/view.php?id=' . $thisApp . '"</script>');
            exit;
        } else {
            echo 'err - 3';
        }
    } else {
        echo 'err - 2';
    }
} else {
    echo 'err - 1';
}

// if($stmt = $con->prepare($appSQL)) {
//     $stmt->bind_param("sssssssssssssssss", $thisApp, $name, $dob, $age, $email, $appDept, $appQ1, $appQ2, $appQ3, $appQ4, $appQ5, $appUser, $appAgree, $appStatus, $dateTime, $appMonth, $appYear); 
//     if($stmt->execute()) {
//         if($stmt = $con->prepare($logSQL)) {
//             $stmt->bind_param("ssss", $dateTime, $systemLogName, $systemLogType, $systemLogDetails);
//             if($stmt->execute()) {
//                 if($stmt = $con->prepare($accountActivitySQL)) {
//                     $stmt->bind_param("sss", $account, $activityDetail, $dateTime);
//                     if($stmt->execute()) {
//                         if($stmt = $con->prepare($appActivitySQL)) {
//                             $stmt->bind_param("sss", $thisApp, $detail, $dateTime);
//                             if($stmt->execute()) {
//                                 $stmt->close();
//                                 $con->close();
//                                 echo('<script>location.href = "/apps/view?id="' . $thisApp . '</script>');
//                                 exit;
//                             } else {
//                                 echo 'err - 8';
//                             }
//                         } else {
//                             echo 'err - 7';
//                         }
//                     } else {
//                         echo 'err - 6';
//                     }
//                 } else {
//                     echo 'err - 5';
//                 }
//             } else {
//                 echo 'err - 4';
//             }
//         } else {
//             echo 'err - 3';
//         }
//     } else {
//         echo 'err - 2';
//     }
// } else {
//     echo 'err - 1';
// }


?>