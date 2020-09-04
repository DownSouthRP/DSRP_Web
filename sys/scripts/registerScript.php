<?php
if(isset($_SESSION['loggedin'])) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
    exit;
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

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
		echo 'Email exists, please choose another or login!';
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
			echo 'Could not prepare statement!';
		}
	}
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
?>

<!-- #broken - Jay L. 1A-1 (2020) -->