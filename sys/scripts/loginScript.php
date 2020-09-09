<!-- Created by: DownSouthRP Development Department -->
<!-- Down South Roleplay Community was founded in 2020 by Jay & Braden. 
Along with some friends, they want to enhance the roleplay without having many restrictions. 
Our main purpose here at Down South Roleplay is to make RP better for everyone. -->

<?php
session_start();
session_destroy();
// STARTS SESSION IF NOT ALREADY STARTED
// if(session_status() !== PHP_SESSION_ACTIVE) {
//     session_start();
// }

// IMPORTS DATABASE CONNECTION - $con 
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

// VALIDATE INPUTS
$email = '';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = validate($_POST["authInputUsername"]);
    $password = validate($_POST["authInputPassword"]);
  }
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



// Prepare our SQL, preparing the SQL statement will prevent SQL injection.**
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['authInputUsername']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    // If the username exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['authInputPassword'], $password)) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            
            session_start();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['id'] = $id;
            $_SESSION['sessionID'] = '';
            echo '<script type="text/javascript">location.href = "/profile/";</script>';
        } else {
            echo "<script>alert('Wrong Password!');</script>";
            echo '<script type="text/javascript">location.href = "/home/auth/";</script>';
        }
    } else {
        echo "<script>alert('Incorrect Username!');</script>";
        echo '<script type="text/javascript">location.href = "/home/auth/";</script>';
    }
} else {
    echo "<script>alert('An error has occured!');</script>";
    echo '<script type="text/javascript">location.href = "/home/auth/";</script>';
}
?>



