<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// CHECK IF USER IS LOGGED IN
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CHECKS TO SEE IF GET IS THERE
if(!isset($_GET) || empty($_GET) || is_null($_GET)) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}
// CHECKS TO SEE IF GET VALUES ARE THERE
if(!isset($_GET['e']) || empty($_GET['e']) || is_null($_GET['e'])) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}
if(!isset($_GET['h']) || empty($_GET['h']) || is_null($_GET['h'])) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}
if(!isset($_GET['r']) || empty($_GET['r']) || is_null($_GET['r'])) {
    echo "<script>alert('An error has occured! Please head back to your email and try again.');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// VALIDATES EVERYTHING
$h = ''; // hash
$e = ''; // email
$r = ''; // return/

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $h = validate($_GET["h"]);
    $e = validate($_GET["e"]);
    $r = validate($_GET["r"]);
    $message = '';
  }
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// GENERATE TEMP PASS RESET CODE

// GENERATE HASH

// 




$mailTo = $email;
$mailSubject = "Password Reset";
$mailLink = 'https://' . $_SERVER['HTTP_HOST'] . '/home/auth/resetPw.php?e=' . $e . '&h=' . $h . '$r=' . $r;
$mailTxt = "Hello, thank you for registering for dsrp.online." . "Head over to " . $mailLink . " to finish your registration.";
$mailHeaders = "From: <REGISTRATION@DSRP.ONLINE>";

if(mail($mailTo,$mailSubject,$mailTxt,$mailHeaders)) {
    echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
    exit;
}


?>