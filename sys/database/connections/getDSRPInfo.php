<?php

include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/dbConnection.php";

$getDSRPInfoSQL = " SELECT * FROM dsrpInfo WHERE id = '1' ";
$getDSRPInfoResult = mysqli_query($con, $getDSRPInfoSQL);
$getDSRPInfoRow = mysqli_fetch_assoc($getDSRPInfoResult);

// $getDSRPInfoRow[''];

// if($stmt = $con->prepare(' SELECT appStaus '))



?>