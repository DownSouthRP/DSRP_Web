<?php
session_start();

// INCLUDE DATABASE CONECTION - $con
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

// VALIDATES EVERYTHING
$newPassword = '';
$confirmNewPassword = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = validateNew($_POST["newPassword"]);
    $confirmNewPassword = validateNew($_POST["confirmNewPassword"]);
}
function validateNew($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// IF NEW PASSWORDS DONT MATCH
if($confirmNewPassword !== $newPassword) {
    echo "<script>alert('Youre two new passwords do not match. Please head back to your email and try again.');</script>";
    echo '<script type="text/javascript">location.href = "/home/";</script>';
    exit;
}

// CREATES THE NEW PASSWORD HASH
$newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
$e = $email;

// GET STATEMENT READY AND EXECUTES
if($stmt = $con->prepare(' UPDATE accounts SET password = ? WHERE email = ? ')) {
    $stmt->bind_param('ss', $newHashedPassword, $e);
    
    if($stmt->execute()) {

        $stmt = $con->prepare(' DELETE FROM temppass WHERE hash = ? ');
        $stmt->bind_param('s', $h);
        if($stmt->execute()) {
            echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
            exit;
        }

    } else {
        echo "<script>alert('Your password has been reset! You will now be redirected.---');</script>";
        echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
        exit;
    }

    
} else {
    echo "<script>alert('Your password has been reset! You will now be redirected.--');</script>";
    echo '<script type="text/javascript">location.href = "/profile/settings/";</script>';
    exit;
}









?>