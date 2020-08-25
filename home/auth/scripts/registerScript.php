<?php
if(isset($_SESSION['loggedin'])) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
    exit;
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

$displayName = $_POST['regInputDisplayName'];
$email = $_POST['regInputEmail'];
$password = password_hash($_POST['regInputPassword'], PASSWORD_DEFAULT);

$accountsSQL = ( " INSERT INTO accounts (displayName, email, password) VALUES ('$displayName', '$email', '$password') " );

if (mysqli_query($con, $accountsSQL)) {
    echo '<script type="text/javascript">location.href = "../login.php";</script>';
    exit;
} else {
    echo "Error: " . $accountsSQL . "<br>" . mysqli_error($con);
}


?>

<!-- #broken - Jay L. 1A-1 (2020) -->