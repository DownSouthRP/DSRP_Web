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
if (!filter_var($_POST['regInputEmail'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['regInputEmail']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo "<script>alert('This email already exists in the system. Choose another one or login.');</script>";
		echo '<script type="text/javascript">location.href = "/home/auth/";</script>';
		exit;
	} else {
		// Username doesnt exists, insert new account
		if ($stmt = $con->prepare('INSERT INTO accounts (displayName, email, password, communityRank, permissionRank) VALUES (?, ?, ?, "Applicant", "Applicant")')) {
			// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
			$password = password_hash($_POST['regInputPassword'], PASSWORD_DEFAULT);
			$stmt->bind_param('sss', $_POST['regInputDisplayName'], $_POST['regInputEmail'], $password);
			$stmt->execute();
			echo '<script type="text/javascript">location.href = "/home/auth/login.php";</script>';
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