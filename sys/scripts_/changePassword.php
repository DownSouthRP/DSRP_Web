<?php
session_start();
// IMPORTS DATABASE CONNECTION
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";

// VALIDATE INPUTS
$oldPassword = '';
$newPassword = '';
$confirmNewPassword = '';
$accountID = '';
$hashedPassword = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPassword = validate($_POST["oldPassword"]);
    $newPassword = validate($_POST["newPassword"]);
    $confirmNewPassword = validate($_POST["confirmNewPassword"]);
    $accountID = $_SESSION['id'];
    
}
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// IF OLD PASSWORD ISNT CORRECT
if ($stmt = $con->prepare(' SELECT id, password FROM accounts WHERE id = ?')) {
    
    $stmt->bind_param('s', $_SESSION['id']);
    $stmt->execute();
    $stmt->store_result();

    // IF THERE IS NO MATCH
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $oldPass);
        $stmt->fetch();

        // CHECKS IF OLD PASSWORD IS CORRECT
        if(password_verify($oldPass, $hashedPassword)) {

                // CHECKS IF NEW PASSWORDS MATCH
                if($confirmNewPassword == $newPassword) {
                    // PREPARES UPDATE STATEMENT
                    $stmt = $con->prepare(' UPDATE accounts SET password = ? WHERE id = ? ');
                    
                    $stmt->bind_param("ss", $hashedPassword, $accountID);
                    $stmt->execute();

                    echo "<script>alert('Password successfully reset!');</script>";
                   // echo('<script>location.href = "/profile/settings"</script>');
                    exit;

                } else {
                    echo "<script>alert('Your new passwords don't match." . $stmt->error . "');</script>";
                    //echo '<script type="text/javascript">location.href = "/profile/settings";</script>';
                    exit;
                }

            } else {
                echo "<script>alert('Your old password does not fit our records.');</script>";
                // echo '<script type="text/javascript">location.href = "/profile/settings";</script>';
                exit;
            }

        } else {
            echo "<script>alert('Your old password doesn't fit our records." . $stmt->error . "');</script>";
          //  echo '<script type="text/javascript">location.href = "/profile/settings";</script>';
            exit;
        }

    } else {
        echo "<script>alert('An error has occured! -- " . $stmt->error . "');</script>";
      //  echo '<script type="text/javascript">location.href = "/profile/settings";</script>';
        exit;
    }




?>