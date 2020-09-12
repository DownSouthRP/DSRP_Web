<?php

// IMPORTS DATABASE CONNECTION - $con 
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

// VALIDATE INPUTS
$displayName = '';
$email = '';
$password = '';
$confirmPassword = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $displayName = validate($_POST["regInputDisplayName"]);
    $email = validate($_POST["regInputEmail"]);
    $password = validate($_POST["regInputPassword"]);
    $confirmPassword = validate($_POST["regInputConfirmPassword"]);
  }
// IF VALID RE-SET VARIABLE
function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// CHECK IF $email IS AN EMAIL
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo "<script>alert('This email already exists in the system. Choose another one or login.');</script>";
		echo '<script type="text/javascript">location.href = "/home/auth/";</script>';
		exit;
	} else {
		$str = rand(); 
		$hash = hash("sha256", $str);
		// Username doesnt exists, insert new account
		if ($stmt = $con->prepare(' INSERT INTO tempaccounts (displayName, email, password, hash) VALUES (?, ?, ?, ?) ')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$stmt->bind_param('ssss', $displayName, $email, $hashedPassword, $hash);
			$stmt->execute();

			$mailTo = $email;
			$mailSubject = "Confirmation Code";
			$mailLink = 'https://www.dsrp.online/home/auth/confirm.php?e="' . $email . '"&h="' . $hash . '"';
			$mailTxt = "Hello, thank you for registering for dsrp.online. <a href='$mailLink'>CLICK HERE</a> to finish your registration.";
			$mailHeaders = "From: DSRP.ONLINE";

			if(mail($mailTo,$mailSubject,$mailTxt,$mailHeaders)) {
				echo '<script type="text/javascript">location.href = "/home/auth/check.php";</script>';
				exit;
			}
			
		} else {
			// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo "<script>alert('ERROR! An error has occured at level 2.');</script>";
            echo '<script type="text/javascript">location.href = "/home/auth/";</script>';
            exit;
		}
	}
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo "<script>alert('ERROR! An error has occured at level 1.');</script>";
	echo '<script type="text/javascript">location.href = "/home/auth/";</script>';
	exit;
}
?>

<!-- #broken - Jay L. 1A-1 (2020) -->