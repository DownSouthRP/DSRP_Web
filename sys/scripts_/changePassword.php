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
$oldPassword = '';
$newPassword = '';
$confirmNewPassword = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = validate($_POST["oldPassword"]);
    $newPassword = validate($_POST["newPassword"]);
    $confirmNewPassword = validate($_POST["confirmNewPassword"]);
}
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// IF OLD PASSWORD ISNT CORRECT
if ($findStmt = $con->prepare(' SELECT password FROM accounts WHERE id = ?')) {
    
    $findStmt->bind_param('s', $_SESSION['id']);
    $findStmt->execute();
    $findStmt->store_result();

    // IF THERE IS NO MATCH
    if ($findStmt->num_rows > 0) {
        $findStmt->bind_result($password);
        $findStmt->fetch();
        
        // CHECKS IF OLD PASSWORD IS CORRECT
        if($oldPassword === $password) {

            // CHECKS IF NEW PASSWORDS MATCH
            if($confirmNewPassword === $newPassword) {
                // PREPARES UPDATE STATEMENT
                $updateStmt = $con->prepare(' UPDATE accounts SET password = ? WHERE id = ? ');
                $hashedPassword = password_hash($confirmNewPassword, PASSWORD_DEFAULT);
                $updateStmt->bind_param("ss", $hashedPassword, $_SESSION['id']);
                $updateStmt->execute();

                echo "<script>alert('Password reset!');</script>";
                echo('<script>location.href = "/profile/settings.php"</script>');
                exit;

            } else {
                echo "<script>alert('Your new passwords don't match.');</script>";
                echo '<script type="text/javascript">location.href = "/profile/settings.php";</script>';
                exit;
            }

        } else {
            echo "<script>alert('Your old password doesn't fit our records.');</script>";
            echo '<script type="text/javascript">location.href = "/profile/settings.php";</script>';
            exit;
        }

    } else {
        echo "<script>alert('An error has occured!--');</script>";
        echo '<script type="text/javascript">location.href = "/profile/settings.php";</script>';
        exit;
    }

} else {
    echo "<script>alert('An error has occured!-');</script>";
    echo '<script type="text/javascript">location.href = "/profile/settings.php";</script>';
    exit;
}




?>