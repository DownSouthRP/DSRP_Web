<?php
session_start();

// CHECK IF USER IS LOGGED IN
if(!isset($_SESSION['loggedin']) && is_null($_SESSION['loggedin']) && empty($_SESSION['loggedin'])) {
    echo '<script type="text/javascript">location.href = "/admin/";</script>';
    exit;
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/config.php";
// CHECK IF USER HAS ADMIN PERMISSIONS (Jr Admin, Admin, Sr. Admin, Core Admin)
if(!isset($permissionRank) && is_null($permissionRank) && empty($permissionRank)) {
    echo '<script type="text/javascript">location.href = "/admin/";</script>';
} else {
    if(!in_array($permissionRank, $adminRanks)) {
        echo '<script type="text/javascript">location.href = "/admin/";</script>';
    }
}

$s = 'TRUE';
$i = '1';

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
if($stmt = $con->prepare(' UPDATE dsrpinfo SET appStatus = ? WHERE id = ? ')) {
    $stmt->bind_param('ss', $s, $i);
    
    if($stmt->execute()) {  
        echo '<script type="text/javascript">location.href = "/admin/settings/";</script>';
    } else {
        echo "<script>alert('An error has occured. Try again!');</script>";
        echo '<script type="text/javascript">location.href = "/admin/";</script>';
        exit;
    }

} else {
    echo "<script>alert('An error has occured. Try again!');</script>";
    echo '<script type="text/javascript">location.href = "/admin/";</script>';
    exit;
}


?>