<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if($_SESSION['loggedin'] !== TRUE) {
    echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
    exit;
}

include_once $_SERVER['DOCUMENT_ROOT']."/sys/design/pageReq.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/i/header.php";

?>