<?php

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$user = $_SESSION['id'];
$tsID = $_POST['inputTeamSpeakID'];

$sql = " UPDATE accounts SET teamspeakID = '".$tsID."' WHERE id = '".$user."' ";

if(mysqli_query($con, $sql)) {
    echo('<script>location.href = "/profile/settings.php"</script>');
} else {
    echo "<script>alert('Error! Please try again!');</script>";
}

?>