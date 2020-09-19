<?php

if($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo "<script>alert('You are not suppose to be here or doing this.');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// MAKE SURE $_POST VALUES ARE VALID
if(!isset($_POST['acceptAppID']) || empty($_POST['acceptAppID']) || is_null($_POST['acceptAppID'])) {
    echo "<script>alert('Error! Please try again!--');</script>";
    echo('<script>history.back();</script>');
    exit;
}
// VALIDATE AND SET VARIABLES
$appID = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $appID = validate($_POST["acceptAppID"]);
    $newStatus = 'Application Accepted';
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// CHANGE SCRIPT
include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
if($stmt = $con->prepare(' UPDATE apps SET appStatus = ? WHERE id = ? ')) {
    $stmt->bind_param("ss", $newStatus, $appID);
    if($stmt->execute()) {
        echo "<script>alert('Application Status has now been set to Accepted!');</script>";
        echo('<script>history.back();</script>');
        exit;

    } else {
        echo "<script>alert('Error! Please try again!');</script>";
        echo('<script>history.back();</script>');
        exit;
    }

} else {
    echo "<script>alert('Error! Please try again!');</script>";
    echo('<script>history.back();</script>');
    exit;
}


?>