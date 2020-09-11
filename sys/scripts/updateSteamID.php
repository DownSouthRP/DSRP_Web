<?php
session_start();
// IMPORTS DATABASE CONNECTION
include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

// VALIDATE INPUTS
$steamID = '';
$user = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $steamID = validate($_POST["inputSteamID"]);
}
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// PREPARES UPDATE STATEMENT
$updateSQL = " UPDATE accounts SET steamID = ? WHERE id = ? ";
$stmt = $con->prepare($updateSQL);
$stmt->bind_param("ss", $steamID, $_SESSION['id']);
$stmt->execute();

echo('<script>location.href = "/profile/settings.php"</script>');

?>