<?php

include($_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php");
include($_SERVER['DOCUMENT_ROOT']."/home/i/header.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if($_SESSION['loggedin'] !== TRUE) {
	echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
}

$accountID = $_GET['id'];





?>