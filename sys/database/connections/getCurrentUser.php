<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

$getCurrentUserSQL = " SELECT * FROM accounts WHERE id = '".$_SESSION['id']."' ";
$getCurrentUserResult = mysqli_query($con, $getCurrentUserSQL);
$getCurrentUserRow = mysqli_fetch_assoc($getCurrentUserResult);

// $getCurrentUserRow[''];
?>