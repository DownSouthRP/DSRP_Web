<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// $oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmNewPassword = $_POST['confirmNewPassword'];
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);


$updateSQL = " UPDATE accounts SET password = '".$hashedPassword."' WHERE id = '".$_SESSION['id']."' ";

if($confirmNewPassword !== $newPassword) {
    echo "passes dont match";
} else {

    if(mysqli_query($con, $updateSQL)) {
        echo("<script>location.href = '/profile/settings.php';</script>");
    }

}


?>