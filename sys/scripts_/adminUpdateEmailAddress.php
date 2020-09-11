<?php
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";




$user = $_GET['userID'];
$url = $_GET['return'];

if(!isset($_POST) || empty($_POST) || is_null($_POST)) {
    echo "<script>alert('Error! Please try again! -');</script>";
    echo('<script>location.href = "' . $url . '"</script>');
    exit;
}
$newEmailAddress = $_POST['newEmailAddress'];


if(empty($newEmailAddress) || empty($user) || empty($url)){
    echo "<script>alert('Error! Please try again!');</script>";
    echo('<script>location.href = "' . $url . '"</script>');
    exit;
}

// CHECK IF EMAIL IS EMAIL
if (!filter_var($newEmailAddress, FILTER_VALIDATE_EMAIL)) {
	echo "<script>alert('Error! This is not a valid email address.');</script>";
    echo('<script>location.href = "' . $url . '"</script>');
    exit;
}

$sql = " UPDATE accounts SET email = '".$newEmailAddress."' WHERE id = '".$user."' ";

if(mysqli_query($con, $sql)) {
    echo('<script>location.href = "' . $url . '"</script>');
} else {

}


?>