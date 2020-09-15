<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// CHECK IF USER IS LOGGED IN
if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == TRUE) {
    
} else {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// GET CURRENT ACCOUNT
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

// GENERATE HASH
$str = rand();
$h = md5($str);
$r = '/profile/settings/sp.php';
$e = $email;


// GENERATE TEMP PASS RESET CODE
if($stmt = $con->prepare(' INSERT INTO temppass (email, hash, r) VALUES (?,?,?) ')) {
    $stmt->bind_param('sss', $e, $h, $r);
    $stmt->execute();
    $stmt->store_result();

    $mailTo = $e;
    $mailSubject = "Password Reset";
    $mailLink = 'https://' . $_SERVER['HTTP_HOST'] . '/home/auth/resetPw.php?e=' . $e . '&h=' . $h . '&r=' . $r;
    $mailTxt = "Hello, we have your request for a password reset for dsrp.online." . "Head over to " . $mailLink . " to reset your password. If you did not request a password reset please ignore this message. Your password has NOT been changed.";
    $mailHeaders = "From: <DOWNSOUTHRP@DSRP.ONLINE>";

    if(mail($mailTo,$mailSubject,$mailTxt,$mailHeaders)) {
        echo "<script>alert('Request successfully submitted. Check your email.');</script>";
        echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
        exit;

    } else {
        echo "<script>alert('An error has occured! Please try again.-');</script>";
        echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
        exit; 
    }

} else {
    echo "<script>alert('An error has occured! Please try again.');</script>";
    echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
    exit; 
}


?>