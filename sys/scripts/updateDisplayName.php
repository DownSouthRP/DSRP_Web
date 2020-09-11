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

// VALIDATE INPUTS
$newDisplayName = '';
$user = $_SESSION['id'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $newDisplayName = validate($_POST["newDisplayName"]);
}
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// PREPARES UPDATE STATEMENT
$updateSQL = " UPDATE accounts SET teamspeakID = ? WHERE id = ? ";
$stmt = $con->prepare($updateSQL);
$stmt->bind_param("ss", $newDisplayName, $_SESSION['id']);
$stmt->execute();

echo('<script>location.href = "/profile/settings.php"</script>');

?>