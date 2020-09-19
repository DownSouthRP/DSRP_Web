<?php

if($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<script>alert('You are not suppose to be here or doing this.');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// MAKE SURE $_POST VALUES ARE VALID
if(!isset($_POST['deniedAppID']) || empty($_POST['deniedAppID']) || is_null($_POST['deniedAppID'])) {
    echo "<script>alert('Error! Please try again!--...');</script>";
    echo('<script>history.back();</script>');
    exit;
}
if(!isset($_POST['denialReasons']) || empty($_POST['denialReasons']) || is_null($_POST['denialReasons'])) {
    echo "<script>alert('Error! Please try again!--..');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// VALIDATE AND SET VARIABLES
$appID = '';
$newReasons = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $appID = validate($_POST["deniedAppID"]);
    $newReasons = validate($_POST["denialReasons"]);
    $newStatus = 'Application Denied';
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// CHANGE SCRIPT
include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
if($stmt = $con->prepare(' UPDATE apps SET appStatus = ?, appDeniedReasons = ? WHERE id = ? ')) {
    $stmt->bind_param("sss", $newStatus, $newReasons, $appID);
    if($stmt->execute()) {
        echo "<script>alert('Application Status has now been set to Denied!');</script>";
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