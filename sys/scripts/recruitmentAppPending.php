<?php

if($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<script>alert('You are not suppose to be here or doing this.');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// MAKE SURE $_POST VALUES ARE VALID
if(!isset($_POST['pendingAppID']) || empty($_POST['pendingAppID']) || is_null($_POST['pendingAppID'])) {
    echo "<script>alert('Error! Please try again!--...');</script>";
    echo('<script>history.back();</script>');
    exit;
}
if(!isset($_POST['pendingNotes']) || empty($_POST['pendingNotes']) || is_null($_POST['pendingNotes'])) {
    echo "<script>alert('Error! Please try again!--..');</script>";
    echo('<script>history.back();</script>');
    exit;
}
if(!isset($_POST['pendingSelect']) || empty($_POST['pendingSelect']) || is_null($_POST['pendingSelect'])) {
    echo "<script>alert('Error! Please try again!--.');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// VALIDATE AND SET VARIABLES
$appID = '';
$newNotes = '';
$newStatus = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $appID = validate($_POST["pendingAppID"]);
    $newNotes = validate($_POST["pendingNotes"]);
    $newStatus = validate($_POST["pendingSelect"]);
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if($newStatus == 'Department Supervisors') {
    $setStatus = 'Application Pending - Department Supervisor Review';
}
elseif($newStatus == 'DSRP Administration') {
    $setStatus = 'Application Pending - Administration Review';
}
elseif($newStatus == 'DSRP Staff') {
    $setStatus = 'Application Pending - Staff Review';
} else {
    echo "<script>alert('The new status could not be set.');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// CHANGE SCRIPT
include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
if($stmt = $con->prepare(' UPDATE apps SET appStatus = ?, appNotes = ? WHERE id = ? ')) {
    $stmt->bind_param("sss", $setStatus, $newNotes, $appID);
    if($stmt->execute()) {
        echo "<script>alert('Application Status has now been set to Pending!');</script>";
        echo('<script>history.back();</script>');
        exit;

    } else {
        echo "<script>alert('Error! Please try again!5');</script>";
        echo('<script>history.back();</script>');
        exit;
    }

} else {
    echo "<script>alert('Error! Please try again!4');</script>";
    echo('<script>history.back();</script>');
    exit;
}

?>