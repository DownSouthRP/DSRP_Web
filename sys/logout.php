<?php
session_destroy();
session_start();

$_SESSION['loggedin'] = FALSE;
$_SESSION['id'] = '';

echo '<script type="text/javascript">location.href = "/home/";</script>';
exit;
?>
