<?php
session_start();
// IMPORTS DATABASE CONNECTION
include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

// VALIDATE INPUTS
$profileBanner = '';
$user = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $profileBanner = validate($_POST["newProfileBanner"]);
}
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// PREPARES UPDATE STATEMENT
if($stmt = $con->prepare(" UPDATE accounts SET profileBanner = ? WHERE id = ? ")) {
    $stmt->bind_param("ss", $profileBanner, $_SESSION['id']);

    if($stmt->execute()) {
        echo('<script>location.href = "/profile/settings/"</script>');
    }

}


?>