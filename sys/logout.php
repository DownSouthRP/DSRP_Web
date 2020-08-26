<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_regenerate_id();
$_SESSION['loggedin'] = FALSE;
$_SESSION['id'] = "";
echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
?>
