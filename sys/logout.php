<?php
session_start();

$_SESSION['loggedin'] = FALSE;
$_SESSION['id'] = '';

session_destroy();

echo '<script type="text/javascript">location.href = "/home/";</script>';
exit;
?>
