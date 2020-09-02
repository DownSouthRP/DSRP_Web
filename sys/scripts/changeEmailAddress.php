<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$newEmailAddress = $_POST['newEmailAddress'];

$updateSQL = " UPDATE accounts SET email = '".$newEmailAddress."' WHERE id = '".$_SESSION['id']."' ";

if (filter_var($_POST['newEmailAddress'], FILTER_VALIDATE_EMAIL)) {

    if(mysqli_query($con, $updateSQL)) {
        echo("<script>location.href = '/profile/settings.php';</script>");
    }

} else {
    echo("<script>location.href = '/profile/settings.php';</script>");
}





?>