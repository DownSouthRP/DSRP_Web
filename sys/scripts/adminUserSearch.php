<!-- DOWNSOUTHRP.COM -->
<!-- CREATED BY THE DOWNSOUTHRP DEVELOPMENT DIVISION -->

<?php

// INCLUDE DATABASE CONECTION - $con
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";
include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";

$searchID = $_POST['searchID'];
$user = '';
$alertNotFound = '<div class="alert alert-warning alert-dismissible fade show" role="alert">This user was not found in the system.</div>';

$searchSQL = " SELECT * FROM accounts WHERE id = '".$searchID."' ";
$searchResult = mysqli_query($con, $searchSQL);
$searchRow = mysqli_fetch_assoc($searchResult);

// IF RESULT IS BLANK - RETURN AND SHOW ALERT
if($searchResult->num_rows >= 1) {
    echo '<script type="text/javascript">location.href = "/admin/users/search/results.php?userID=' . $searchRow['id'] . '";</script>';
} else {
// IF NOT BLANK GO TO RESULTS PAGE AND DISPLAY RESULTS
    echo "<script>alert('No users found with that Web ID.');</script>";
    echo '<script type="text/javascript">location.href = "/admin/users/";</script>';
}

?>