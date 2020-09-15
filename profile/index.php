<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {
    include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
    echo '<script type="text/javascript">location.href = "view.php?id=' . $id . '";</script>';
} else {
    echo '<script type="text/javascript">location.href = "/home/";</script>';
}


?>