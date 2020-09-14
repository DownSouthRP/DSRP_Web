<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// PULLS THE CURRENT USER SQL
include_once $_SERVER['DOCUMENT_ROOT']."/sys/database/connections/getCurrentUser.php";
// REDIRECTS WITH URL
echo '<script type="text/javascript">location.href = "view.php?id=' . $id . '";</script>';

?>