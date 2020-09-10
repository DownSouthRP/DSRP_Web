<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$user = $_SESSION['id'];
$discordID = $_POST['inputDiscordID'];

$sql = " UPDATE accounts SET discordID = '".$discordID."' WHERE id = '".$user."' ";

if(mysqli_query($con, $sql)) {
    echo('<script>location.href = "/profile/settings.php"</script>');
} else {
    echo "<script>alert('Error! Please try again!');</script>";
}

?>