<!-- [[

Created by: DownSouthRP Development Department

Down South Roleplay Community was founded in 2020 by Jay & Braden. 
Along with some friends, they want to enhance the roleplay without having many restrictions. 
Our main purpose here at Down South Roleplay is to make RP better for everyone.

]] -->

<?php
// START SESSION IF NOT ALERADY STARTED
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// IMPORTS DATABASE CONNECTION
include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

// IF $_GET HAS ERROR
if(!isset($_GET) || empty($_GET) || is_null($_GET)) {
    echo "<script>alert('Error! Please try again!-');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// IF $_POST HAS ERROR
if(!isset($_POST) || empty($_POST) || is_null($_POST)) {
    echo "<script>alert('Error! Please try again!-');</script>";
    echo('<script>history.back();</script>');
    exit;
}

// SETS EMPTY VARIABLE
$userID = '';
$url = '';
$newDisplayName = '';

// VALIDATE VARIABLES
$userID = validate($_GET["userID"]);
$url = validate($_GET["return"]);
$newDisplayName = validate($_POST['newDisplayName']);

// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// PREPARE, BIND PARAMs, EXECUTE SQL
$stmt = $con->prepare(' UPDATE accounts SET communityRank = ? WHERE id = ? ');
$stmt->bind_param("ss", $newDisplayName, $userID);
$stmt->execute();

echo('<script>location.href = "' . $url . '"</script>');

?>