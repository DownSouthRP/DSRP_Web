<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// CHECK IF USER IS LOGGED IN AND THEN GO TO EITHER A OR B
if($_SESSION['loggedin'] == TRUE) {
    include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
    // GENERATE HASH
    $str = rand();
    $h = md5($str);
    $e = $email;
    $r = '/profile/settings/sp.php';
    

} else {

    // CHECK IF $_POST IS A THING
    if(!isset($_POST) || empty($_POST) || is_null($_POST)) {
        echo "<script>alert('An error has occured. Try again! Code: Tyler');</script>";
        echo '<script type="text/javascript">location.href = "/home/auth/request.php";</script>';
        exit;
    }

    // CHECKS IF $_POST['resetEmail'] IS ACTUALLY A THING
    if(!isset($_POST['resetEmail']) || empty($_POST['resetEmail']) || is_null($_POST['resetEmail'])) {
        echo "<script>alert('You never entered an email. Please try again and this time enter an email.');</script>";
        echo '<script type="text/javascript">location.href = "/home/auth/request.php";</script>';
        exit;
    }

    
    $e = '';
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // GENERATE HASH
        $str = rand();
        $h = md5($str);
        $e = validate($_POST["resetEmail"]);
        $r = '/home/auth/login.php';
    
    } else {
        echo "<script>alert('An error has occured. Try again! Code: Jay');</script>";
        echo '<script type="text/javascript">location.href = "/home/auth/request.php";</script>';
        exit;
    }

}





// GET CURRENT ACCOUNT
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

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
        echo "<script>alert('An error has occured! Please try again. Code: Blake');</script>";
        echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
        exit; 
    }

} else {
    echo "<script>alert('An error has occured! Please try again. Code: William');</script>";
    echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
    exit; 
}


?>