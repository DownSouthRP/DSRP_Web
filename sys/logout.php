<!-- Created by the DownSouthRP Development Department -->
<!-- Copywrite 2020 | DSRP | DownSouthRP -->

<!-- 
    FILE INFORMAITON

    THIS FILE LOG THE CURRENT USER OUT AND REDIRECT TO THE HOME PAGE 
-->

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
session_regenerate_id();
$_SESSION['loggedin'] = FALSE;
$_SESSION['id'] = "";
echo '<script type="text/javascript">location.href = "/home/index.php";</script>';
?>
