<?php
session_start();

if(!isset($_SESSION['loggedin']) && is_null($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
    echo "<script>alert('Error! Please try again!----');</script>";
    echo '<script type="text/javascript">location.href = "/admin/";</script>';
    exit;
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";

if(!isset($permissionRank) && is_null($permissionRank) && empty($permissionRank)) {
    echo "<script>alert('Error! Please try again!---');</script>";
    echo('<script>history.back();</script>');
    exit;
} else {
    if(!in_array($permissionRank, $adminRanks)) {
        echo "<script>alert('Error! Please try again!--');</script>";
        echo('<script>history.back();</script>');
        exit;
    }
}

if(!isset($_GET) || empty($_GET) || is_null($_GET)) {
    echo "<script>alert('Error! Please try again!-');</script>";
    echo('<script>history.back();</script>');
    exit;
}

$userID = '';
$action = '';
$server = '';

// VALIDATE VARIABLES
$userID = validate($_GET['user']);
$action = validate($_GET['action']);
$server = validate($_GET['server']);

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
if($stmt = $con->prepare(' SELECT steamID FROM accounts WHERE id = ? ')) {
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows > 0) {
        $stmt->bind_result($steamID);
    } else {
        echo "<script>alert('We could not find this user.--');</script>";
        echo '<script>history.back();</script>';
        exit;
    }

} else {
    echo "<script>alert('We could not find this user.-');</script>";
    echo '<script>history.back();</script>';
    exit;
}

if($action == 'add') {
    if($stmt = $con->prepare(' INSERT INTO whitelist (user, whitelist, server) VALUES (?,?,?) ')) {
        $stmt->bind_param("sss", $userID, $steamID, $server);
        if($stmt->execute()) {
            echo '<script>history.back();</script>';
            exit;
        } else {
            echo "<script>alert('ALERT ALERT2');</script>";
            exit;
        }
        
    } else {
        echo "<script>alert('ALERT ALERT');</script>";
        exit;
    }
}
elseif($action == 'remove') {
    if($stmt = $con->prepare(' DELETE FROM whitelist WHERE user = ? AND server = ? ')) {
        $stmt->bind_param("ss", $userID, $server);
        if($stmt->execute()) {
            echo '<script>history.back();</script>';
            exit;
        } else {
            echo "<script>alert('ALERT ALERT1');</script>";
            exit;
        }
        
    } else {
        echo "<script>alert('ALERT');</script>";
        exit;
    }
} else {
    echo "<script>alert('Ad error has occured at the rear.');</script>";
    echo '<script>history.back();</script>';
    exit;
}


?>