<!-- DOWNSOUTHRP.COM -->
<!-- CREATED BY THE DOWNSOUTHRP DEVELOPMENT DIVISION -->

<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";




$user = $_GET['userID'];
$url = $_GET['return'];

if(!isset($_POST) || empty($_POST) || is_null($_POST)) {
    echo "<script>alert('Error! Please try again!');</script>";
    echo('<script>location.href = "' . $url . '"</script>');
    exit;
}
$newPermission = $_POST['newCommunityRank'];


if(empty($newPermission) || empty($user) || empty($url)){
    echo "<script>alert('Error! Please try again!');</script>";
    echo('<script>location.href = "' . $url . '"</script>');
    exit;
}

$sql = " UPDATE accounts SET communityRank = '".$newPermission."' WHERE id = '".$user."' ";

if(mysqli_query($con, $sql)) {
    echo('<script>location.href = "' . $url . '"</script>');
} else {

}


?>